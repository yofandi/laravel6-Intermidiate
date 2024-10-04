<?php

namespace App\Listeners;

use App\Events\Userlogged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
     * @param  Userlogged  $event
     * @return void
     */
    public function handle(Userlogged $event)
    {
        //
    }
}
