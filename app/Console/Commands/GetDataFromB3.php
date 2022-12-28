<?php

namespace App\Console\Commands;

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
    protected $signature = 'get-data-b3';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {



        return Command::SUCCESS;
    }
}
