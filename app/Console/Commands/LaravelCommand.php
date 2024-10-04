<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LaravelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel:basic
                            {argument : ini adalah deskripsi argumen}
                            {--o|opsi= : ini adalah deskripsi opsi}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Laravel basic command';

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
        $this->info('informasi muncul dalam terminal');
        $this->error('something went wrong');
        $this->line('display this on the screen');

        $this->line(print_r($this->options()) . ' ' . print_r($this->arguments()));

        $this->line($this->option('opsi') . ' ' . $this->argument('argument'));

        $name = $this->ask('what is your name?');
        $password  = $this->secret('input your password!');

        if ($this->confirm('Do you want to continue?')) {
            $this->line($name . ' ' . $password);
        }
    }
}
