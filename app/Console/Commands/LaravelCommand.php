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
                            {argument: ini adalah deskripsi argumen}
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
        //
    }
}
