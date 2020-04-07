<?php

namespace App\Http\Controllers;

use App\Unit;
use App\Charge;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Unit $unit
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Http\Response
     */
    public function store(Unit $unit)
    {
        if ($unit->update(['status' => 'charging'])) {
            return $unit->charges()->create(['start' => now()]);
        }

        return response('Could not update unit.', 501);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Unit $unit
     * @param \App\Charge $charge
     * @return void
     */
    public function update(Request $request, Unit $unit, Charge $charge)
    {
        //
    }
}
