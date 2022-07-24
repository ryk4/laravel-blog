<?php

namespace App\Services;

use App\Mail\NewSubscription;
use App\Models\Subscription;
use App\Models\Tag;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class SubscriptionService
{
    public function subscribe(Request $request): void
    {
        Subscription::create([
            'email' => $request->email
        ]);

        $message = (new NewSubscription($request->email, self::generateUnsubscribeUrl($request->email)))->onQueue(
            'emails'
        );

        Mail::to($request->email)->queue($message);
    }

    public function unsubsribe(string $email): void
    {
        $email = Crypt::decryptString($email);

        Subscription::where('email', $email)->delete();
    }

    public function generateUnsubscribeUrl($email): string
    {
        return env('APP_URL') . '/unsubscribe/' . Crypt::encryptString($email);
    }
}
