<?php

namespace App\Jobs;

use App\User;
use App\Mail\SendMailable;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Mail::to('yofandirikiwinata12@gmail.com')
        // ->send(new SendMailable());

        $words = [
            'aberration' => 'a state or condition markedly different from the norm',
            'convivial' => 'occupied with or fond of the pleasures of good company',
            'diaphanous' => 'so thin as to transmit light',
            'elegy' => 'a mournful poem; a lament for the dead',
            'ostensible' => 'appearing as such but not necessarily so'
        ];
        $users = User::all();
        foreach ($users as $user) {
            $key = array_rand($words);
            $value = $words[$key];

            Mail::raw("{$key} -> {$value}", function ($mail) use ($user) {
                $mail->from('yofandirikiwinata34@gmail.com');
                $mail->to('yofandirikiwinata12@gmail.com')
                    ->subject('is Good all the time');
            });

            sleep(5);
        }
    }
}
