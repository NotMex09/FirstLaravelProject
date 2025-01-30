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
            // Fetch the IDs of themes the user is subscribed to
            $subscribedThemeIds = $this->subscriptions()->pluck('theme_id');

            // Fetch three random articles from those themes that are published
            return Article::whereIn('theme_id', $subscribedThemeIds)
                ->where('status', 'published')
                ->inRandomOrder() // Randomize the order
                ->take(3)         // Limit to 3 articles
                ->get();
        }
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'image',
    ];
    // public function hasRole($role)
    // {
    //     return $this->role === $role;
    // }
}
