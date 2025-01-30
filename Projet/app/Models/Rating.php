<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['rating', 'article_id', 'user_id'];

    // A rating belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A rating belongs to an article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
