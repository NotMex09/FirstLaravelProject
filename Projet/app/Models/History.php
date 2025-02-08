<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['user_id', 'article_id', 'viewed_at'];
    
    // Add this casting to convert viewed_at to a Carbon instance
    protected $casts = [
        'viewed_at' => 'datetime',
    ];

    // A history entry belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A history entry belongs to an article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}