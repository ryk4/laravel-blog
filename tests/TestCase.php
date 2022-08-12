<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

    public function authenticateAsAdmin()
    {
        $user = User::factory()->create(['role' => User::ROLE_ADMIN]);

        auth()->login($user);
    }

    public function authenticateAsNormalUser()
    {
        $user = User::factory()->create(['role' => User::ROLE_NORMAL]);

        auth()->login($user);
    }

    public function authenticateAsGuest()
    {
        auth()->logout();
    }
}
