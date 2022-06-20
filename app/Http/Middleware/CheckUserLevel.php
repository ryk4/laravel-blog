<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserLevel
{
    public function handle(Request $request, Closure $next, string $role)
    {
        $roles = [
            'admin' => 0,
            'super user' => 1,
            'blogger' => 2,
            'standard' => 3,
        ];

        if (auth()->id(0) == null) {//not logged in
            return redirect()->route('home');
        }

        if (auth()->user()->role > $roles[$role]) {
            abort(403);
        }

        return $next($request);
    }
}
