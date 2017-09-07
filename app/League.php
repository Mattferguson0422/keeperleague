<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class league extends Model

{
    /**
     * The users that belong to the league
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * The drafts that belong to the league.
     */
    public function drafts()
    {
        return $this->hasMany(Draft::class);
    }
}
