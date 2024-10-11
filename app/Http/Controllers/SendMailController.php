<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use Illuminate\Http\Request;

class SendMailController extends Controller
{
    function sendMail()
    {
        SendMailJob::dispatch()->delay(now()->addSecond(5));
        echo "email sent";
    }
}
