<?php

namespace App\Listeners;

use App\Events\UserLogged;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateLog
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
     * @param  UserLogged  $event
     * @return void
     */
    public function handle(UserLogged $event)
    {
        $message = now() . " {$event->request->user()->name} just {$event->type} from the application";
        Storage::append('file.log', $message);
    }
}
