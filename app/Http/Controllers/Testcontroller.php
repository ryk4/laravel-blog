<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Testcontroller extends Controller
{
    public function design()
    {
        return view('design.design1');
    }
}
