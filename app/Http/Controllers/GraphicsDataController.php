<?php

namespace App\Http\Controllers;

use App\Http\Resources\GraphicsDataResource;
use App\Models\LendingOpenPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraphicsDataController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($active)
    {
        $lindingOpenPossitionData = DB::table('lending_open_positions')
            ->where('TckrSymb', '=', $active)
            ->get();

        // dd($lindingOpenPossitionData);

        return GraphicsDataResource::make($lindingOpenPossitionData);
    }
}
