<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Issue;
use App\Models\Theme;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $themes = Theme::where('is_featured', true)->get();
        $issues = Issue::where('is_public', true)->latest()->take(5)->get();
        $articles = Article::where('status', 'published')->latest()->paginate(6); // Paginate 6 articles per page

        return view('home', compact('themes', 'issues', 'articles'));
    }
}
