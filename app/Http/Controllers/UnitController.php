<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Unit[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Unit::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \App\Unit|\Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        return response($unit);
    }
}
