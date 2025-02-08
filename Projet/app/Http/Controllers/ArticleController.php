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
use App\Models\History;
class ArticleController extends Controller
{
    public function index()
{
    $articles = Article::when(!Auth::check(), function($query) {
        $query->whereDoesntHave('issues', function($q) {
            $q->where('is_public', false);
        });
    })->get();

    return view('articles.index', compact('articles'));
}

    public function create()
    {
        $themes = Theme::all();
        return view('articles.create', compact('themes'));
    }

    public function show(Article $article)
    {
        // Check accessibility using model method
    if (!$article->is_publicly_accessible()) {
        abort_if(!Auth::check(), 403, 'This article is part of a private issue. Please log in to view.');
    }
    // Automatically update or create history entry
    if (Auth::check()) {
        History::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'article_id' => $article->id,
            ],
            [
                'viewed_at' => now(), // Updates timestamp on every visit
            ]
        );
    }
    
        return view('articles.show', compact('article'));
    }
    public function is_publicly_accessible()
    {
        if (Auth::check()) return true;
        
        return !$this->issues()->where('is_public', false)->exists();
    }
    // app/Http/Controllers/ArticleController.php
public function updateStatus(Request $request, $id)
{
    $article = Article::findOrFail($id);
    $article->status = $request->status;
    
    // Set publication date when publishing
    if ($request->status === 'published' && !$article->published_at) {
        $article->published_at = now();
    }
    
    $article->save();

    return redirect()->route('dashboard')->withFragment('Proposed-articles-list');
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

        return redirect()->route('dashboard')->with('success', 'Article added successfully!');
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
    public function unsave(Article $article)
{
    Auth::user()->savedArticles()->detach($article->id);

    return back()->with('success', 'Article removed from saved list.');
}

} 