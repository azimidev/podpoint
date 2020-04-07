<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['name', 'address', 'postcode', 'status'];
    protected $with = ['charges'];

    public function charges()
    {
        return $this->hasMany(Charge::class);
    }
}
