<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Send a new email
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = collect([
            'name' => $request->name ?? 'N/A',
            'mobile' => $request->mobile ?? 'N/A',
            'comment' => $request->comment,
        ]);

        $message = (new ContactUs($data))->onQueue('emails');

        Mail::to($request->email)->queue($message);

        return redirect()->route('blogs.index')
            ->with('successStatus', 'Email sent');
    }
}
