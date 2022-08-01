<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriptionRequest;
use App\Services\SubscriptionService;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SubscriptionController extends Controller
{
    private SubscriptionService $service;

    public function __construct()
    {
        $this->service = new SubscriptionService();
    }

    /**
     * @param StoreSubscriptionRequest $request
     * @return RedirectResponse
     */
    public function store(StoreSubscriptionRequest $request)
    {
        $this->service->subscribe($request);

        return redirect()->route('blogs.index')
            ->with('successStatus', 'You have subscribed');
    }

    /**
     * @param string $email
     * @return Application|Factory|View|RedirectResponse
     */
    public function destroy(string $email)
    {
        try {
            $this->service->unsubsribe($email);
        } catch (DecryptException $e) {
            return redirect()->route('blogs.index')
                ->with('warningStatus', 'Invalid link');
        }

        return view('general.unsubscribe_confirm')
            ->with('successStatus', 'You have un-subscribed');;
    }

}
