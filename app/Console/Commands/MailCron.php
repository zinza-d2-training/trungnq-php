<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MailCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail happy birthday to user every 5 minutes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $day = date('d');
        $month = date('m');
        $list = User::whereMonth('dob', $month)->whereDay('dob', $day)->get();
        if (count($list)) {
            foreach ($list as $item) {
                $email = $item->email;
                Mail::send('email.happy-birthday', [], function ($message) use ($email) {
                    $message->to($email);
                    $message->subject('Reset Password');
                });
            }
        }
    }
}
