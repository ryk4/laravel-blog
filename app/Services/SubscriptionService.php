<?php

namespace App\Services;

use App\Mail\NewSubscription;
use App\Models\Subscription;
use App\Repositories\SubscriptionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class SubscriptionService
{
    private SubscriptionRepository $repository;

    public function __construct()
    {
        $this->repository = new SubscriptionRepository();
    }

    public function subscribe(Request $request): void
    {
        $this->repository->create($request);

        $message = (new NewSubscription($request->email, self::generateUnsubscribeUrl($request->email)))->onQueue(
            'emails'
        );

        Mail::to($request->email)->queue($message);
    }

    public function unsubsribe(string $email): void
    {
        $email = Crypt::decryptString($email);

        $this->repository->delete($email);
    }

    public function generateUnsubscribeUrl($email): string
    {
        return env('APP_URL') . '/unsubscribe/' . Crypt::encryptString($email);
    }
}
