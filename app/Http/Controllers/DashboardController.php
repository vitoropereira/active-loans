<?php

namespace App\Http\Controllers;

use App\Jobs\GetDataFromB3Job;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        GetDataFromB3Job::dispatch();

        return Inertia::render('Dashboard');
    }
}
