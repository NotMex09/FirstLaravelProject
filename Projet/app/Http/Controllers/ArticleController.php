<?php


namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Issue;
use App\Models\Subscription;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    // Add the following method in your ArticleController

public function index()
{
    // Fetch articles based on status (adjust according to your needs)
    $articles = Article::all(); // You can modify this query to filter articles as required

    // Return the view, passing the articles
    return view('articles.index', compact('articles',));
}

    public function create()
    {
        $themes = Theme::all();
        return view('articles.create', compact('themes'));
    }
    public function show($id)
    {
            // Fetch the logged-in user
            $user = Auth::user();


        // Fetch the article from the database using the provided ID
        $article = Article::findOrFail($id);

        // Return the view for the article, passing the article data
        return view('articles.show', compact('article' ,'user'));
    }
    public function updateStatus(Request $request, $id)
    {
        // Validate incoming data
        $request->validate([
            'status' => 'required|in:pending,approved,published', // Adjust status values as needed
        ]);

        // Find the article and update the status
        $article = Article::findOrFail($id);
        $article->status = $request->status;
        $article->save();

      // Redirect to dashboard with fragment for the proposed articles section
        return redirect()->route('dashboard')->with('success', 'Article status updated successfully!')->withFragment('Proposed-articles-list');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'theme_id' => 'required|exists:themes,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate the image file

        ]);

  // Handle image upload
  $imagePath = null;
  if ($request->hasFile('image')) {
      $imagePath = $request->file('image')->store('articles', 'public'); // Store image in 'public/articles' directory
  }

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'theme_id' => $request->theme_id,
            'user_id' => Auth::id(),
            'status' => 'pending',
            'image' => $imagePath, // Save the image path
        ]);


        return redirect()->route('dashboard')->with('success', 'Article add  successfully!');
    }

    public function destroy($id)
    {
        // Fetch the article by ID
        $article = Article::findOrFail($id);
   // Delete the image if it exists
   if ($article->image) {
    Storage::disk('public')->delete($article->image); // Delete image from public storage
}
        // Delete the article
        $article->delete();

        // Redirect back with a success message
        return redirect()->route('dashboard')->with('success', 'Article deleted successfully.');
    }


}


