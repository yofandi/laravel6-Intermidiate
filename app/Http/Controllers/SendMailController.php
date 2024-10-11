<?php

namespace App\Http\Controllers;

use App\Mail\SendMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    function sendMail()
    {
        Mail::to('yofandirikiwinata12@gmail.com')
            ->send(new SendMailable());

        echo "email sent";
    }
}
