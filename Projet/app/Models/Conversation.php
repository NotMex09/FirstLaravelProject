<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CommentLike;
class Conversation extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'article_id','parent_id', 'user_id'];

    // A conversation belongs to an article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    // A conversation belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function replies()
{
    return $this->hasMany(Conversation::class, 'parent_id');
}

public function parent()
{
    return $this->belongsTo(Conversation::class, 'parent_id');
}
public function likes()
{
    return $this->hasMany(CommentLike::class)->where('is_like', true);
}

public function dislikes()
{
    return $this->hasMany(CommentLike::class)->where('is_like', false);
}

public function userLike($userId)
{
    return $this->hasOne(CommentLike::class)->where('user_id', $userId)->first();
}

}
