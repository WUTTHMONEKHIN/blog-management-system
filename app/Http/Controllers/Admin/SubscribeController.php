<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {
        $name = auth()->user()->name;
        $email = auth()->user()->email;
        $user_id = auth()->user()->id;

        // Check if the email already exists in the 'subscribes' table
        $existingSubscription = Subscribe::where('email', $email)->first();

        if ($existingSubscription) {
            // Return with an error message if the email is already subscribed
            return back()->withErrors(['email' => 'This email address is already subscribed to our blog system.']);
        }

        // Save the new subscription
        $subscribe = new Subscribe();
        $subscribe->name = $name;
        $subscribe->email = $email;
        $subscribe->user_id = $user_id;
        $subscribe->save();

        return back()->with('success', 'You have successfully subscribed to our blog system.');
    }
}
