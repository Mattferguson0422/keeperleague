<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pick', 'owner_id'
    ];

    /**
     * The Result belongs to one Draft.
     */
    public function draft()
    {
        return $this->belongsTo(Draft::class);
    }
}
