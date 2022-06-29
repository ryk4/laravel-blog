<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscribeListRequest;
use App\Http\Requests\UpdateSubscribeListRequest;
use App\Models\Subscription;

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
     * @param \App\Http\Requests\StoreSubscribeListRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscribeListRequest $request)
    {
        Subscription::create([
            'email'=>$request->email
        ]);



        return redirect()->route('blogs.index')
            ->with('successStatus', 'subscribed');
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
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateSubscribeListRequest $request
     * @param \App\Models\Subscription $subscribeList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubscribeListRequest $request, Subscription $subscribeList)
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
