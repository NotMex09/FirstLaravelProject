<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
  

    // An issue can have many articles
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_issue');
    }
    protected $casts = [
        'publication_date' => 'date', // Cast to Carbon instance
        'is_public' => 'boolean', // Optional: Cast to boolean
    ];
        // Optionally, you can add an accessor for retrieving the full image path
        public function getImagePathAttribute()
        {
            return asset('storage/images/issues/' . $this->image); // Modify according to your storage setup
        }
    protected $fillable = [
        'title',
        'description',
        'publication_date',
        'is_public',
        'image', ];
}
