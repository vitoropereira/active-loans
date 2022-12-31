<?php

namespace App\Console\Commands;

use App\Jobs\GetDataFromB3Job;
use App\Models\LendingOpenPosition;
use Illuminate\Console\Command;
use Illuminate\Http\Client\PendingRequest;

class GetDataFromB3 extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'B3-DATA:get-5day-ago';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This commands get some data from B3.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        GetDataFromB3Job::dispatch();

        return Command::SUCCESS;
    }
}
