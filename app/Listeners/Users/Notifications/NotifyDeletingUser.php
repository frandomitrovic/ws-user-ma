<?php

namespace App\Listeners\Users\Notifications;

use App\Events\Users\DeletingUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyDeletingUser
{
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
     * @param  \App\Events\Users\DeletingUser  $event
     * @return void
     */
    public function handle(DeletingUser $event)
    {
        //
    }
}
