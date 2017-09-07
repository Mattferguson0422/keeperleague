<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The Order belong to one draft.
     */
    public function draft()
    {
        return $this->belongsTo(Draft::class);
    }
}
