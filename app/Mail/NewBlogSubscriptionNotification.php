<?php

namespace App\Mail;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewBlogSubscriptionNotification extends Mailable
{
    use Queueable;
    use SerializesModels;

    public Blog $blog;
    public string $unsubscribeUrl;

    public $subject = 'New blog notification';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Blog $blog, string $unsubscribeUrl)
    {
        $this->blog = $blog;
        $this->unsubscribeUrl = $unsubscribeUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new_blog_subscription_notification');
    }
}
