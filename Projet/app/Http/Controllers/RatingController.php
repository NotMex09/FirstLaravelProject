<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'article_id' => 'required|exists:articles,id',
        ]);

        // Check if the user has already rated this article
        $existingRating = Rating::where('article_id', $request->article_id)
            ->where('user_id', auth()->id())
            ->first();

        if ($existingRating) {
            // If the user has already rated, update the rating
            $existingRating->rating = $request->rating;
            $existingRating->save();
            return redirect()->route('articles.show', $request->article_id)
                ->with('success', 'Your rating has been updated!');
        } else {
            // If the user hasn't rated yet, create a new rating
            $rating = new Rating();
            $rating->rating = $request->rating;
            $rating->article_id = $request->article_id;
            $rating->user_id = auth()->id();
            $rating->save();

            return redirect()->route('articles.show', $request->article_id)
                ->with('success', 'Your rating has been submitted!');
        }
    }
    }
