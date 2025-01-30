<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\Subscription;

class Theme extends Model
{
    public function manager()
        {
            return $this->belongsTo(User::class, 'manager_id');
        }
     // A theme can have many articles
        public function articles()
        {
            return $this->hasMany(Article::class);
        }

        // A theme can have many subscriptions
        public function subscriptions()
        {
            return $this->hasMany(Subscription::class);
        }
          // Optionally, you can add an accessor for retrieving the full image path
    public function getImagePathAttribute()
    {
        return asset('storage/images/themes/' . $this->image); // Modify according to your storage setup
    }
    protected $fillable = [
        'name',
        'description',
        'manager_id',
        'is_featured',
        'image',
    ];
}
