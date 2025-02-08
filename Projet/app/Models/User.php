<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;
    public function manager_of_theme()
    {
        // Assuming you have a relationship or logic to determine theme management
        return $this->theme_id; // Replace this with your actual logic
    }
    // Relationships

    // A user can have many subscriptions
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }
    public function savedArticles()
{
    return $this->belongsToMany(Article::class, 'saved_articles');
}

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }
    public function managedThemes()
{
    return $this->hasMany(Theme::class, 'manager_id');
}
public function theme()
{
    return $this->belongsTo(Theme::class, 'manager_of_theme_id');
}

    /**
     * Fetch recommended articles based on the user's subscribed themes.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function recommendedArticles()
{
    // Get base query for published articles
    $baseQuery = Article::where('status', 'published');

    // 1. Get subscribed theme articles (excluding viewed/saved)
    $subscribedThemeIds = $this->subscriptions()->pluck('theme_id');
    $subscribedArticles = $baseQuery->whereIn('theme_id', $subscribedThemeIds)
        ->whereNotIn('id', $this->viewedArticleIds())
        ->whereNotIn('id', $this->savedArticleIds())
        ->inRandomOrder()
        ->take(10)
        ->get();

    // 2. Get recently viewed articles (from history)
    $historyArticles = $this->histories()
        ->with('article')
        ->orderBy('viewed_at', 'desc')
        ->take(5)
        ->get()
        ->pluck('article')
        ->filter();

    // 3. Get high-rated articles (>= 3 stars)
    $ratedArticles = $this->highRatedArticles()
        ->with('article')
        ->get()
        ->pluck('article')
        ->filter();

    // 4. Get saved articles
    $savedArticles = $this->savedArticles()
        ->where('status', 'published')
        ->inRandomOrder()
        ->take(5)
        ->get();

    // 5. Popular articles in subscribed themes (fallback)
    $popularFallback = $baseQuery->whereIn('theme_id', $subscribedThemeIds)
        ->withCount('histories')
        ->orderBy('histories_count', 'desc')
        ->take(10)
        ->get();

    // Combine all sources with weights
    $combined = collect([])
        ->concat($subscribedArticles->map(fn($a) => (object)['weight' => 4, 'article' => $a]))
        ->concat($historyArticles->map(fn($a) => (object)['weight' => 3, 'article' => $a]))
        ->concat($ratedArticles->map(fn($a) => (object)['weight' => 5, 'article' => $a]))
        ->concat($savedArticles->map(fn($a) => (object)['weight' => 6, 'article' => $a]))
        ->concat($popularFallback->map(fn($a) => (object)['weight' => 1, 'article' => $a]));

    // Remove duplicates and nulls
    $unique = $combined->filter()->unique('article.id');

    // Sort by weight and get top 5
    return $unique->sortByDesc('weight')
        ->take(5)
        ->pluck('article');
}
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'image',
    ];
    // for recomended articles
public function highRatedArticles()
{
    return $this->hasMany(Rating::class)->where('rating', '>=', 3);
}

public function viewedArticleIds()
{
    return $this->histories()->pluck('article_id');
}

public function savedArticleIds()
{
    return $this->savedArticles()->pluck('article_id');
}
    // public function hasRole($role)
    // {
    //     return $this->role === $role;
    // }
}
