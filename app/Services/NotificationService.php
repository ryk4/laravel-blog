<?php

namespace App\Services;

use App\Mail\NewBlogSubscriptionNotification;
use App\Models\Blog;
use App\Models\Subscription;
use Illuminate\Support\Facades\Mail;

class NotificationService
{
    public function notifyAllSubscribers(Blog $blog): void
    {
        $subscriberList = Subscription::all();

        $subscriptionService = new SubscriptionService();

        $subscriberList->each(function ($subscriber, $key) use ($blog, $subscriptionService) {
            $unsubscribeUrl = $subscriptionService->generateUnsubscribeUrl($subscriber->email);

            $message = (new NewBlogSubscriptionNotification($blog, $unsubscribeUrl))->onQueue('emails');

            Mail::to($subscriber->email)->queue($message);
        });
    }
}
