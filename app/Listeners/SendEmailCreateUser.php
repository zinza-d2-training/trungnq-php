<?php

namespace App\Listeners;

use App\Events\CreateUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Bus\Queueable;

class SendEmailCreateUser implements ShouldQueue
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
     * @param  \App\Events\CreateUser  $event
     * @return void
     */
    public function handle(CreateUser $event)
    {
        $email = $event->email;
        Mail::send('email.new-account', ['user' => $event->user], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Create Account');
        });
    }
}
