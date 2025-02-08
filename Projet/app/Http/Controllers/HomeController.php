<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Issue;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::where('status', 'published')
        ->where(function($query) {
            $query->whereDoesntHave('issues', function($q) {
                $q->where('is_public', false);
            });
            if (Auth::check()) {
                $query->orWhereHas('issues');
            }
        })
        ->whereNotNull('published_at')
        ->orderBy('published_at', 'desc')
        ->take(8)
        ->get();
        $themes = Theme::where('is_featured', true)->get();
        $issues = Issue::where('is_public', true)->latest()->take(5)->get();
        $articles = Article::where('status', 'published')
        ->whereNotNull('published_at') // Only show articles with publication date
        ->orderBy('published_at', 'desc') // New order
        ->take(8)
        ->get();

        return view('home', compact('themes', 'issues', 'articles'));
    }
}
