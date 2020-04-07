<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $fillable = ['start', 'end', 'unit_id'];
    protected $casts    = ['start' => 'datetime', 'end' => 'datetime'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
