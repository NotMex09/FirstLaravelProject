<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
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
