<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriptionRequest;
use App\Mail\NewSubscription;
use App\Models\Subscription;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreSubscriptionRequest $request, SubscriptionService $service)
    {
        $service->subscribe($request);

        return redirect()->route('blogs.index')
            ->with('successStatus', 'You have subscribed');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Subscription $subscribeList
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscribeList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Subscription $subscribeList
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscribeList)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Subscription $subscribeList
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscribeList)
    {
        //
    }
}
