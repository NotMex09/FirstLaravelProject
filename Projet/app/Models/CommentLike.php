<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentLike extends Model
{
    use HasFactory;

    protected $fillable = ['conversation_id', 'user_id', 'is_like'];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}

