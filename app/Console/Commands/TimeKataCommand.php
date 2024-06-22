<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\TimeKataChristmasTaskService;

class TimeKataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'timekata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Christmas Time Kata';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $durations = [
            '02:03:35',
            '01:21:05',
            '00:13:27',
            '21:00:12',
        ];

        $timeKataService = new TimeKataChristmasTaskService();
        $result = $timeKataService($durations);
        echo ($result[0] ? 'true' : 'false').PHP_EOL;
        echo $result[2].':'.$result[1].PHP_EOL;

        return Command::SUCCESS;
    }
}
