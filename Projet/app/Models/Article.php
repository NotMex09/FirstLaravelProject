<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversation;

class Article extends Model
{
    public function savedByUsers()
{
    return $this->belongsToMany(User::class, 'saved_articles');
}
public function histories()
{
    return $this->hasMany(History::class);
}
    public function issues()
    {
        return $this->belongsToMany(Issue::class, 'article_issue');
    }
    public function ratings()
{
    return $this->hasMany(Rating::class);
}

    public function author()
{
    return $this->belongsTo(User::class, 'user_id');  // Assuming 'user_id' is the column in the articles table
}
    // An article belongs to a theme
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    // An article belongs to a user (author)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // An article can have many conversations
    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }
      // Optionally, you can add an accessor for retrieving the full image path
      public function getImagePathAttribute()
      {
          return asset('storage/images/articles/' . $this->image); // Modify according to your storage setup
      }
      //for recomended articles
public function isSavedByUser($user)
{
    return $user ? $user->savedArticles->contains($this->id) : false;
}

public function averageRating()
{
    return number_format($this->ratings()->avg('rating') ?? 0, 1);
}
public function is_publicly_accessible()
{
    if (Auth::check()) return true;
    
    // Check if article is in any private issues
    return !$this->issues()->where('is_public', false)->exists();
}
    protected $fillable = [
        'title',
        'content',
        'theme_id',
        'user_id',
        'status',
        'image',
        'published_at',
    ];
}
