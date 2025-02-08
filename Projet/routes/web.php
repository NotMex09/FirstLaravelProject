<?php


use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SavedArticleController;

// Route::get('/', function () {
//     return view('welcome');
// });


// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('themes', ThemeController::class);
Route::resource('issues', IssueController::class);


// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
// For saving to history (new route )
Route::post('/history', [HistoryController::class, 'store'])
    ->name('history.store')
    ->middleware('auth');
    Route::delete('/history/{history}', [HistoryController::class, 'destroy'])
    ->name('history.destroy')
    ->middleware('auth');
 // Profile Routes (Choose one)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'index'])->name('profile'); // View profile (GET)
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update'); // or UserController
});
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Other protected routes...
});
// routes/web.php
Route::middleware('auth')->group(function () {
    Route::post('/conversations/store', [ConversationController::class, 'store'])->name('conversations.store');
});
Route::middleware(['auth', 'role:editor'])->group(function () {
    Route::resource('issues', IssueController::class)->except(['index', 'show']);
});




Route::resource('issues', IssueController::class);


Route::get('/about', [AboutController::class, 'index'])->name('about');
// Contact Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact'); // Show contact form
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit'); // Handle form submission
// Privacy Route
Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');
// Authenticated Routes
Route::middleware(['auth', 'role:editor'])->group(function () {
    Route::resource('issues', IssueController::class)->except(['index', 'show']);
});

Route::middleware(['auth', 'role:manager'])->group(function () {
    // Manager-specific routes
});

Route::middleware(['auth', 'role:subscriber'])->group(function () {
    // Subscriber-specific routes
});
Route::resource('articles', ArticleController::class);



Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');
Route::get('/themes/{id}', [ThemeController::class, 'show'])->name('themes.show');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::post('/conversations/store', [ConversationController::class, 'store'])->name('conversations.store');
Route::post('/ratings/store', [RatingController::class, 'store'])->name('ratings.store');
Route::post('/comments/like-dislike', [ConversationController::class, 'toggleLikeDislike'])->middleware('auth');

// Route to delete a user
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


// Show the edit form for a specific user
Route::get('/users/{user}/edit-role', [UserController::class, 'editUser'])->name('users.edit-role');

// Update a specific user's role
Route::put('/users/{user}/update-role', [UserController::class, 'updateUserRole'])->name('users.update-role');
Route::delete('/conversations/{conversation}', [ConversationController::class, 'destroy'])->name('conversations.destroy');

Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
Route::delete('/issues/{issue}', [IssueController::class, 'destroy'])->name('issues.destroy');

Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::get('/issues/create', [IssueController::class, 'create'])->name('issues.create');

Route::post('/issues', [IssueController::class, 'store'])->name('issues.store');




Route::put('articles/{id}/status', [ArticleController::class, 'updateStatus'])->name('articles.updateStatus');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::delete('articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
// Store a new theme

Route::post('/themes', [ThemeController::class, 'store'])->name('themes.store');
// Show the form to create a new theme

Route::get('/themes/create', [ThemeController::class, 'create'])->name('themes.create');
// Display themes and handle pagination
Route::get('/themes', [ThemeController::class, 'index'])->name('themes.index');


// Saved Articles Routes
Route::post('/articles/{article}/save', [SavedArticleController::class, 'toggle'])->name('articles.save');
Route::delete('/articles/{article}/unsave', [ArticleController::class, 'unsave'])->name('articles.unsave');
//private issue articles 
// Add this before any article routes
Route::bind('article', function ($value) {
    $article = Article::findOrFail($value);
    
    if (!$article->is_publicly_accessible()) {
        abort_unless(Auth::check(), 403, 'This article is part of a private issue. Please log in to view.');
    }

    return $article;
});