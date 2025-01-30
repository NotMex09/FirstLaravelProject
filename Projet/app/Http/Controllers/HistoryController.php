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
        $histories = $user->histories()->with('article')->latest()->get();
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
}
