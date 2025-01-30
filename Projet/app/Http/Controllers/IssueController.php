<?php


    namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class IssueController extends Controller
{
    public function index()
    {
         // Check if the user is logged in and get issues accordingly
         $issues = Auth::check() ? Issue::latest()->get() : Issue::where('is_public', true)->latest()->get();
        return view('issues.index', compact('issues'));
    }

    public function create()
    {
        return view('issues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'publication_date' => 'required|date',
            'is_public' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image file

        ]);
                // Handle the image upload
                $imagePath = null;
                if ($request->hasFile('image')) {
                    // Store image in the 'public/issues' directory
                    $imagePath = $request->file('image')->store('issues', 'public'); // 'issues' folder inside the public storage
                }


        Issue::create([
            'title' => $request->title,
            'description' => $request->description,
            'publication_date' => $request->publication_date,
            'is_public' => $request->is_public ?? 0,
            'image' => $imagePath, // Save the image path to the database

        ]);

 // Redirect to the issues index with a success message
 return redirect()->route('issues.index')->with('success', 'Issue created successfully!');
}

    public function show(Issue $issue)
    {   
        if (!$issue->is_public && !Auth::check()) {
            abort(403, 'Unauthorized access');
        }
        $issue->load('articles'); 
        return view('issues.show', compact('issue'));
    }

    public function edit(Issue $issue)
    {
        return view('issues.edit', compact('issue'));
    }

    public function update(Request $request, Issue $issue)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'publication_date' => 'required|date',
            'is_public' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image file

        ]);
            // Handle the image upload
            if ($request->hasFile('image')) {
                // Store image in the 'public/issues' directory
                $imagePath = $request->file('image')->store('issues', 'public');
                $request->merge(['image' => $imagePath]); // Add image path to request
            }

        $issue->update($request->all());

        return redirect()->route('issues.index')->with('success', 'Issue updated successfully!');
    }

    public function destroy(Issue $issue)
    {
        $issue->delete();
        return redirect()->route('issues.index')->with('success', 'Issue deleted successfully!');
    }
}
