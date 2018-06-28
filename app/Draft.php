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
        $draft = Draft::findOrFail($draftId);

        for($i = 1; $i <= $draft->rounds; $i++) {

            for ($p = 1; $p <= $draft->teams; $p++) {

                $result = new Result;
                $result->team_name = "Enter Team Name";
                $result->pick = "Round $i Pick $p";
                $result->draft_id = $draft->id;
                $result->round = $i;
                $result->pick_number = $p;
                $result->save();
            }
        }
    }

    public function createSnakeDraft($teams)
    {
        $teamsReverse = array_reverse($teams);

        for($i = 1; $i <= $this->rounds; $i++) {

            if ($i % 2 != 0) {
                $roundTeams = $teams;
            } else {
                $roundTeams = $teamsReverse;
            }


            foreach($roundTeams as $key => $team) {
                $result = Result::where('draft_id',$this->id)
                    ->where('round', $i)
                    ->where('pick_number', ($key + 1))
                    ->first();

                $result->team_name = $team->team_name;
                $result->owner_id = $team->owner_id;

                $result->update();
            }
        }
    }

    public function createStraightDraft($teams)
    {
        for($i = 1; $i <= $this->rounds; $i++) {


            foreach($teams as $key => $team) {
                $result = Result::where('draft_id',$this->id)
                    ->where('round', $i)
                    ->where('pick_number', ($key + 1))
                    ->first();

                $result->team_name = $team->team_name;
                $result->owner_id = $team->owner_id;

                $result->update();
            }
        }
    }
}
