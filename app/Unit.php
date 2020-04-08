<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    /**
     * Mass assignment protection.
     *
     * @var array $fillable
     */
    protected $fillable = ['name', 'address', 'postcode', 'status'];
    /**
     * Eager loading.
     *
     * @var array $with
     */
    protected $with = ['charges'];

    /**
     * HasMany charges relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function charges()
    {
        return $this->hasMany(Charge::class);
    }
}
