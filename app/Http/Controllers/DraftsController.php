<?php

namespace App\Http\Controllers;
use App\Player;
use App\Draft;
use Illuminate\Http\Request;

class DraftsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show a specific Draft Board
    public function show(Draft $draft)
    {
        $users = $draft->league->users;
        $draftOrder = json_decode($draft->order);
        $draftNames = [];

        $draft->update();

        foreach($draftOrder as $user_id) {
            $draftNames[] = $users->where('id', '=', $user_id)->first();
        }

        // Player info 'All Players' so we can show them on the draft board
        // Available players to show lists of the Best Available
        $allPlayers = Player::all();
        $availablePlayers = $allPlayers->where('drafted',0);

        return view('drafts.show', compact('draft','draftOrder', 'draftNames', 'allPlayers', 'availablePlayers'));
    }

}
