<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DailyWord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:word';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send daily email all users';

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
     * @return mixed
     */
    public function handle()
    {
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
                    ->subject('ini percobaan saya dalam mengirim email');
            });

            sleep(5);
        }
    }
}
