<?php

namespace App\Listeners;

use App\Mail\WelcomeNewUserMail;
use Illuminate\Support\Facades\Mail;

/**
 * Class WelcomeNewUserListener
 *
 * @package App\Listeners
 */
class WelcomeNewUserListener
{
    /**
     * Handle the event.
     *
     * @param object $event
     *
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;
        Mail::to($event->user['email'])->send(new WelcomeNewUserMail($user));
    }
}
