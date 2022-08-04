<?php

namespace App\Listeners;

use App\Events\DeletePost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Bus\Queueable;

class SendEmailToPostAuthor implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\DeletePost  $event
     * @return void
     */
    public function handle(DeletePost $event)
    {
        $email = $event->email;
        Mail::send('email.delete-post', ['post' => $event->post], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Delete post');
        });
    }
}
