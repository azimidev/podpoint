<?php

namespace App\Http\Controllers;

use App\Unit;
use App\Charge;

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
     * @param \App\Unit $unit
     * @param \App\Charge $charge
     * @return bool|\Illuminate\Http\Response|void
     */
    public function update(Unit $unit, Charge $charge)
    {
        if ($unit->update(['status' => 'available'])) {
            return $charge->update(['end' => now()]);
        }

        return response('Could not update unit.', 501);
    }
}
