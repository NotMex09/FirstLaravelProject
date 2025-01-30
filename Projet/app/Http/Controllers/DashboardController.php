<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Issue;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Article;
use App\Models\Theme;
use App\Models\Conversation;


class DashboardController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        // Fetch recommended articles
        $recommendedArticles = $user->recommendedArticles();

        // Fetch subscribed themes
        $subscribedThemes = $user->subscriptions()->with('theme')->get()->pluck('theme');
        $myThemeSubscriptions = Article::where('theme_id', auth()->user()->manager_of_theme) ->get();
        // Fetch all articles with status published
        $articles = Article::where('status', 'published')->get();
        $myThemeArticles = Article::where('theme_id', auth()->user()->manager_of_theme)->get();
        $myThemeProposedArticles = Article::where('theme_id', auth()->user()->manager_of_theme)
        ->where(function ($query) {
            $query->where('status', 'pending')
                ->orWhere('status', 'approved');
        })
        ->get();
        $myConversations = Conversation::where('user_id', auth()->user()->id)
    ->get();

        $myThemeConversations = Conversation::where('theme_id', auth()->user()->manager_of_theme) ->get();
        // Retrieve articles for the authenticated user and paginate
        $userArticles = Article::where('user_id', auth()->id())->get();
        // Fetch all articles with status pending or approved
        $proposedArticles = Article::whereIn('status', ['pending', 'approved'])->get();

        $themes = Theme::all(); // Fetching all themes from the database

        // Fetch all issues with pagination (10 users per page)
        $issues = Issue::all();

        // Fetch all users with pagination (10 users per page)
        $users = User::all();
        $subscriptions= Subscription::all();
        // Fetch conversations with related articles and users
        $userConversations = Conversation::where('user_id', auth()->id())->get();
        $conversations = Conversation::all();

        // Get the statistics
        $userCount = User::count();  // Number of users
        $themeCount = Theme::count();  // Number of themes
        // $subscriptionCount = Subscription::count();  // Number of subscriptions


        $themeId = Auth::user()->manager_of_theme;
        if ($themeId) {
            $subscriptionCount = Subscription::where('theme_id', $themeId)->count();
        } else {
            // If no theme_id is provided, get the total subscription count
            $subscriptionCount = Subscription::count();
        }


        $articleCount = Article::count();  // Number of articles
        $commentCount = Conversation::count();  // Number of comments

        // Return the appropriate dashboard view based on the user's role
        $viewName = match ($user->role) {
            'editor' => 'dashboard.editor',
            'manager' => 'dashboard.manager',
            'subscriber' => 'dashboard.subscriber',
            default => 'dashboard',
        };

        // Pass statistics to the view
        return view($viewName, compact(
            'recommendedArticles',
            'subscribedThemes',
            'articles',
            'themes',
            'subscriptions',
            'issues',
            'users',
            'subscriptionCount',
            'conversations',
            'userCount',  // Pass user count
            'themeCount',  // Pass theme count
            'articleCount',  // Pass article count
            'commentCount',  // Pass comment count
            'userArticles',
            'userConversations',
            'proposedArticles',
            'myThemeArticles',
            'myThemeProposedArticles',
            'myThemeSubscriptions',
            'myThemeConversations',
            'myConversations',
        ));
    }
}
