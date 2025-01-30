<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Theme;
use App\Models\User;
use App\Models\Conversation;

class Article extends Model
{
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
    protected $fillable = [
        'title',
        'content',
        'theme_id',
        'user_id',
        'status',
        'image',
    ];
}
