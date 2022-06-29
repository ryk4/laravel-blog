<?php

namespace App\Services;

use App\Mail\NewSubscription;
use App\Models\Subscription;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriptionService
{
    public function subscribe(Request $request): void
    {
        Subscription::create([
            'email' => $request->email
        ]);

        $message = (new NewSubscription($request->email))->onQueue('emails');

        Mail::to($request->email)->queue($message);
    }

//    public function unsubsribe(Tag $tag): void
//    {
//        $tag->delete();
//    }
}
