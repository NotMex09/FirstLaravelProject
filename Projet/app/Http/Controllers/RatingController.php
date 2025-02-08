<?php namespace App\Http\Controllers;

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
                $existingRating->rating = $request->rating;
                $existingRating->save();
                return back()->with('success', 'Your rating has been updated!');
            } else {
                Rating::create([
                    'rating' => $request->rating,
                    'article_id' => $request->article_id,
                    'user_id' => auth()->id(),
                ]);
    
                return back()->with('success', 'Your rating has been submitted!');
            }
    }
    }