<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $histories = $user->histories()
                      ->with('article') // Eager load the article relationship
                      ->orderBy('viewed_at', 'desc') // Sort by viewed_at in descending order
                      ->get();
        return view('history.index', compact('histories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
        ]);

        History::create([
            'article_id' => $request->article_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'History recorded successfully!');
    }
    public function destroy(History $history)
{
     // Ensure the user owns this history record
     if (Auth::id() !== $history->user_id) {
        abort(403, 'Unauthorized action.');
    }

    $history->delete();
    return back()->with('success', 'Removed from history');
}
}
