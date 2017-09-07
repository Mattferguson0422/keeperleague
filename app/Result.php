<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    /**
     * The Result belong to one draft.
     */
    public function draft()
    {
        return $this->belongsTo(Draft::class);
    }
}
