<?php

namespace App\Repositories;

use App\Interfaces\SubscriptionInterface;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionRepository implements SubscriptionInterface
{
    public function create(Request $request): void
    {
        Subscription::create([
            'email' => $request->email
        ]);
    }

    public function delete(string $email): void
    {
        Subscription::where('email', $email)->delete();
    }
}
