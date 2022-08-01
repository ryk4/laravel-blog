<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class ContactUs extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public string $name;
    public string $mobile;
    public string $comment;
    public string $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Collection $data)
    {
        $this->name = $data->get('name');
        $this->mobile = $data->get('mobile');
        $this->comment = $data->get('comment');
        $this->email = $data->get('email');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact_us');
    }
}
