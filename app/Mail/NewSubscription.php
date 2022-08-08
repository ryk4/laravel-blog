<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewSubscription extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public string $email;
    public string $unsubscribeUrl;

    public $subject = 'New subscription';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $email, string $unsubscribeUrl)
    {
        $this->email = $email;
        $this->unsubscribeUrl = $unsubscribeUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new_subscription');
    }
}
