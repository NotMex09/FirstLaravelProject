<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'article_id', 'user_id'];

    // A conversation belongs to an article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    // A conversation belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }}
