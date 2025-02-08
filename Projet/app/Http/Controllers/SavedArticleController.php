<?php

namespace App\Http\Controllers;

use App\Models\SavedArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
class SavedArticleController extends Controller
{
    public function toggle(Request $request, Article $article)
    {
        $user = Auth::user();

        $savedArticle = SavedArticle::where([
            'user_id' => $user->id,
            'article_id' => $article->id
        ])->first();

        if ($savedArticle) {
            $savedArticle->delete();
            return response()->json(['status' => 'unsaved']);
        }

        SavedArticle::create([
            'user_id' => $user->id,
            'article_id' => $article->id
        ]);

        return response()->json(['status' => 'saved']);
    }
}