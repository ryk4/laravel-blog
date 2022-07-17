<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriptionRequest;
use App\Mail\NewSubscription;
use App\Models\Subscription;
use App\Services\SubscriptionService;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new SubscriptionService();
    }

    public function store(StoreSubscriptionRequest $request)
    {
        $this->service->subscribe($request);

        return redirect()->route('blogs.index')
            ->with('successStatus', 'You have subscribed');
    }

    public function destroy(string $email)
    {
        try {
            $this->service->unsubsribe($email);
        } catch (DecryptException $e) {
            return redirect()->route('blogs.index')
                ->with('warningStatus', 'Invalid link');
        }

        return redirect()->route('blogs.index')
            ->with('successStatus', 'You have unsubscribed');
    }
}
