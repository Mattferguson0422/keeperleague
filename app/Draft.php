<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class draft extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'sport', 'rounds', 'draft_type'
    ];

    /**
     * The draft belong to one league.
     */
    public function league()
    {
        return $this->belongsTo(League::class);
    }

    /**
     * The draft has many results.
     */
    public function results()
    {
        return $this->hasMany(Result::class);
    }

    /**
     *  Auto-populate Results Table with future results
     */
    public function createResults($draftId)
    {
        $draft = Draft::find($draftId);

        for($i = 1; $i <= $draft->rounds; $i++) {

            for ($p = 1; $p <= $draft->teams; $p++) {

                $result = new Result;
                $result->pick = "Round $i Pick $p";
                $result->draft_id = $draft->id;
                $result->round = $i;
                $result->pick_number = $p;
                $result->save();
            }
        }
    }
}
