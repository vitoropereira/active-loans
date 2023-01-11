<?php

namespace App\Console\Commands;

use App\Jobs\GetDataFromB3Job;
use App\Jobs\GetDataFromDayFromB3Job;
use Illuminate\Console\Command;

class GetDateFromB3ByDate extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'B3-DATA:get-data-from-day {date}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command fetches data from B3 on a specific date. (Date format must be yyyy-mm-dd)';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = $this->argument('date');

        GetDataFromDayFromB3Job::dispatch($date);

        return Command::SUCCESS;
    }
}
