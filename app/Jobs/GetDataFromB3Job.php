<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetDataFromB3Job implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getDates($days)
    {
        $today = date('Y-m-d');
        $todayTimestamp = strtotime($today);
        $dates = array();
        $dates[] = $today;

        $i = 1;
        while ($i <= $days) {
            $yesterdayTimestamp = strtotime("-1 day", $todayTimestamp);
            $yesterday = date('Y-m-d', $yesterdayTimestamp);
            $dates[] = $yesterday;
            $todayTimestamp = $yesterdayTimestamp;
            $i++;
        }

        return $dates;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $dates = $this->getDates(5);

        foreach ($dates as $date) {
            $alreadyBeenTakens = DB::table('date_has_already_been_takens')
                ->where('date', '=', $date)
                ->get();

            if (count($alreadyBeenTakens) === 0) {
                GetDataFromDayFromB3Job::dispatch($date);
            }
        }
    }
}
