<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install everything';

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
        // copy(base_path('.env.example'), base_path('.env'));
        $this->info('Copied .env.example to .env <info>✔</info>');

        // Artisan::call('key:generate');
        $this->info('Ran php artisan key:generate <info>✔</info>');

        $this->call('migrate');
        $this->info('Ran php artisan migrate <info>✔</info>');
        // front yarn
        // front build

        $this->line($this->output());
    }
}
