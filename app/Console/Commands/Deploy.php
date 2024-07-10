<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\ProgressBar;

class Deploy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deploy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $ascii = <<<TEXT

██       █████  ██████   █████  ██    ██ ███████ ██           ██████ ██       ██████  ██    ██ ██████  
██      ██   ██ ██   ██ ██   ██ ██    ██ ██      ██          ██      ██      ██    ██ ██    ██ ██   ██ 
██      ███████ ██████  ███████ ██    ██ █████   ██          ██      ██      ██    ██ ██    ██ ██   ██ 
██      ██   ██ ██   ██ ██   ██  ██  ██  ██      ██          ██      ██      ██    ██ ██    ██ ██   ██ 
███████ ██   ██ ██   ██ ██   ██   ████   ███████ ███████      ██████ ███████  ██████   ██████  ██████  
                                                                                                               
TEXT;

        /* $ascii = <<<TEXT
  _                              _    ____ _                 _ 
 | |    __ _ _ __ __ ___   _____| |  / ___| | ___  _   _  __| |
 | |   / _` | '__/ _` \ \ / / _ \ | | |   | |/ _ \| | | |/ _` |
 | |__| (_| | | | (_| |\ V /  __/ | | |___| | (_) | |_| | (_| |
 |_____\__,_|_|  \__,_| \_/ \___|_|  \____|_|\___/ \__,_|\__,_|
                                                               
TEXT; */

        
        $this->info($ascii);

        $this->line("We are provisioning your project.".PHP_EOL);

        $steps = [
            'Creating project',
            'Checkout out code',
            'Running composer',
            'Running migration',
            'Ready!'
        ];

        ProgressBar::setFormatDefinition('custom', '[%bar%] %current%/%max% - %message%');

        $bar = $this->output->createProgressBar(count($steps));
        $bar->setFormat('custom');

        $bar->setMessage('Starting...');
        $bar->start();

        foreach ($steps as $step) {
            $bar->setMessage($step);
            $bar->advance();
            sleep(1);
        }

        $bar->finish();

        $this->line(PHP_EOL);
        $this->info('Provision successful...Enjoy 😎'.PHP_EOL);

        $this->table(
            ['Region', 'Project ID', 'Project Title', 'URL'],
            [
                ['US East 1', '082724', 'Klasio LMS', 'https://klasio.laravel.cloud']
            ],
        );

        $this->line('');
    }
}
