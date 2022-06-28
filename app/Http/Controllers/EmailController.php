<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmailController extends Controller
{
    /**
     * Send a new email
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        dd('sending email');
    }
}
