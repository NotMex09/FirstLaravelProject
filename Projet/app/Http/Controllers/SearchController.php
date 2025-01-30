<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Issue;
use App\Models\Theme;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search Articles
        $articles = Article::where('title', 'like', "%$query%")
            ->orWhere('content', 'like', "%$query%")
            ->get();

        // Search Themes
        $themes = Theme::where('name', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->get();

        // Search Issues
        $issues = Issue::where('title', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->get();

        return view('search.results', compact('articles', 'themes', 'issues', 'query'));
    }}
