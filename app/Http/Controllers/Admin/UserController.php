<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function edit()
    {
        $user = auth()->user();

        return view('admin.user.edit', compact('user'));
    }


    public function update(Request $request)
    {
        //
    }
}
