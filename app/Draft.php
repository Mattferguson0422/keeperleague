<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class draft extends Model
{
    /**
     * The draft belong to one league.
     */
    public function league()
    {
        return $this->belongsTo(League::class);
    }

    /**
     * The draft has one set of results.
     */
    public function result()
    {
        return $this->hasOne(Result::class);
    }
}
