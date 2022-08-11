<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface SubscriptionInterface
{
    public function create(Request $request): void;

    public function delete(string $email): void;
}
