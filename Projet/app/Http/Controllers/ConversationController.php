<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CommentLike;
class ConversationController extends Controller
{

public function toggleLikeDislike(Request $request)
{
    $request->validate([
        'conversation_id' => 'required|exists:conversations,id',
        'is_like' => 'required|boolean',
    ]);

    $user = Auth::user();
    $conversation = Conversation::findOrFail($request->conversation_id);

    // Check if the user already liked/disliked this comment
    $existingLike = CommentLike::where('conversation_id', $conversation->id)
        ->where('user_id', $user->id)
        ->first();

    if ($existingLike) {
        // If the same action is repeated, remove it
        if ($existingLike->is_like == $request->is_like) {
            $existingLike->delete();
            return response()->json(['message' => 'Removed reaction', 'likes' => $conversation->likes()->count(), 'dislikes' => $conversation->dislikes()->count()]);
        }

        // Otherwise, update it
        $existingLike->update(['is_like' => $request->is_like]);
    } else {
        // Create a new like/dislike
        CommentLike::create([
            'conversation_id' => $conversation->id,
            'user_id' => $user->id,
            'is_like' => $request->is_like,
        ]);
    }
    return response()->json([
        'message' => 'Reaction updated',
        'likes' => $conversation->likes()->count(),
        'dislikes' => $conversation->dislikes()->count(),
        'user_like' => $existingLike ? null : ($request->is_like ? 'like' : 'dislike')
    ]);
}

    public function destroy(Conversation $conversation)
    {
        $conversation->delete();

        return redirect()->back()->with('success', 'Conversation deleted successfully.');
    }
    public function store(Request $request)
{
    $request->validate([
        'article_id' => 'required|exists:articles,id',
        'message' => 'required|string',
    ]);
    if ($request->parent_id) {
        logger('Parent ID: ' . $request->parent_id);
    } else {
        logger('Parent ID is null or missing');
    }
    // Conversation::create([
    //     'article_id' => $request->article_id,
    //     'user_id' => Auth::id(),
    //     'message' => $request->message,
    // ]);
    // return redirect()->back()->with('success', 'Message sent successfully!');

// Create a new conversation/message
$conversation = new Conversation();
$conversation->message = $request->message;
$conversation->article_id = $request->article_id;
// Fetch the theme_id from the article
$article = Article::find($request->article_id);
$conversation->theme_id = $article->theme_id; // Add the theme_id from the article
$conversation->parent_id = $request->parent_id;
$conversation->user_id = auth()->id(); // Associate the message with the logged-in user
$conversation->save();

$user = auth()->user();
    $profilePicture = $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('default-profile.png');

 // Redirect back to the article page with a success message
 return redirect()->route('articles.show', $request->article_id)
        ->with('success', 'Your message has been posted!')
        ->with('profilePicture', $profilePicture);
}

}
