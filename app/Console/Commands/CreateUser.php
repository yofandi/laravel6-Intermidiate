<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel:adduser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create default user';

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
        $name = $this->ask('Input name!');
        $email = $this->ask('input your email');
        $password = $this->secret('input your secret!');

        $this->line("user: {$name} <{$email}>");

        if ($this->confirm('Do you wish to continue?')) {
            $user = new User();

            $user->name = $name;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->save();

            $this->info('User has been created!');
        } else {
            $this->error('Canceled!');
        }


        $this->line('Done');
    }
}
