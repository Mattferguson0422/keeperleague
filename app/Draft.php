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
}
