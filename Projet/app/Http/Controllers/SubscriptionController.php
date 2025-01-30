<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'theme_id' => 'required|exists:themes,id',
        ]);

        // Check if the user is already subscribed to the theme
        $subscription = Subscription::where('user_id', auth()->id())
            ->where('theme_id', $request->input('theme_id'))
            ->first();

        if ($subscription) {
            // If the user is already subscribed, delete the subscription (unsubscribe)
            $subscription->delete();
            return redirect()->back()->with('success', 'You have successfully unsubscribed from the theme.');
        } else {
            // If the user is not subscribed, create a new subscription
            $newSubscription = new Subscription();
            $newSubscription->user_id = auth()->id();
            $newSubscription->theme_id = $request->input('theme_id');
            $newSubscription->save();
            return redirect()->back()->with('success', 'You have successfully subscribed to the theme.');
        }
    }
    

}
