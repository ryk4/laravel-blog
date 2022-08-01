<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use App\Services\NotificationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    private NotificationService $service;

    public function __construct()
    {
        $this->service = new NotificationService();
    }

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
            'email' => $request->email,
        ]);

        $this->service->contactUsFormPost($data);

        return redirect()->route('blogs.index')
            ->with('successStatus', 'Email sent');
    }
}
