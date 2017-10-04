<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class league extends Model

{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'join_key', 'member_count',
    ];

    /**
     * The users that belong to the league
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }


    public function drafts()
    {
        return $this->hasMany(Draft::class);
    }
}
