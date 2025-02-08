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
use App\Models\Rating;

class DashboardController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        // Fetch recommended articles
        $recommendedArticles = $user->recommendedArticles();

        // Fetch subscribed themes
        $subscribedThemes = $user->subscriptions()->with('theme')->get()->pluck('theme');
        $myThemeSubscriptions = Subscription::where('theme_id', auth()->user()->manager_of_theme)
        ->with('user') // Eager load the user relationship
        ->get();
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

    $myThemeConversations = Conversation::whereHas('article', function ($query) {
        $query->where('theme_id', auth()->user()->manager_of_theme);
    })->with(['article', 'user'])->get(); // Eager load relationships
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
        $histories = Auth::user()
                 ->histories()
                 ->with('article')
                 ->orderBy('viewed_at', 'desc') // Sort by viewed_at in descending order
                 ->get();
        // Fetch the user's ratings with related articles
        $myRatings = Rating::where('user_id', $user->id)->with('article')->get();
           // Fetch ratings for all articles in the theme the user manages
    $themeRatings = [];
    if ($user->manager_of_theme) {
        $themeRatings = Rating::whereHas('article', function ($query) use ($user) {
            $query->where('theme_id', $user->manager_of_theme);
        })->with('article', 'user')->get();
    }
    // Fetch all ratings (for admins)
    $allRatings = Rating::with('article', 'user')->get();
      // Fetch saved articles
      $savedArticles = $user->savedArticles()->with('user')->get();
        return view($viewName, compact(
            'histories',
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
            'myRatings',
            'themeRatings',
            'allRatings',
            'savedArticles',
            'proposedArticles',
            'myThemeArticles',
            'myThemeProposedArticles',
            'myThemeSubscriptions',
            'myThemeConversations',
            'myConversations',
        ));
    }
}
