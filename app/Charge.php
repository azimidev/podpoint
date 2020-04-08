<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    /**
     * Mass assignment protection.
     *
     * @var array $fillable
     */
    protected $fillable = ['start', 'end', 'unit_id'];
    /**
     * Attribute casting.
     *
     * @var array $casts
     */
    protected $casts = ['start' => 'datetime', 'end' => 'datetime'];

    /**
     * BelongsTo unit relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
