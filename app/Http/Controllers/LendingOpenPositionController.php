<?php

namespace App\Http\Controllers;

use App\Jobs\GetDataFromB3Job;
use App\Jobs\GetDataFromDayFromB3Job;
use App\Models\LendingOpenPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class LendingOpenPositionController extends Controller
{
    public function index()
    {
        return Inertia::render('DataB3');
    }

    public function show()
    {
        request()->validate([
            'date' => ['required', 'date'],
        ]);

        GetDataFromDayFromB3Job::dispatch(request('date'));

        $lindingOpenPossitionData =  LendingOpenPosition::query()
            ->when(
                request('date'),
                fn ($query) => $query->where('RptDt', request('date'))
            )->paginate(200);

        return Inertia::render('DataB3', [
            'lindingOpenPossitionData' => $lindingOpenPossitionData
        ]);
    }

    public function graphics()
    {
        $graphicsData = DB::table('lending_open_positions')
            ->select('*')
            ->groupBy('TckrSymb')
            ->where('TckrSymb', '!=', '')
            ->get();

        Log::info($graphicsData);
        return Inertia::render('Graphics', [
            'graphicsData' => $graphicsData,
            'graphicsDataActive' => request('active')
        ]);
    }
}
