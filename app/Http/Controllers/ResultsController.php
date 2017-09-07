<?php

namespace App\Http\Controllers;

use App\Player;
use App\Draft;
use Illuminate\Http\Request;

class ResultsController extends Controller
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

    //Show all results
    public function index()
    {

    }

    // Update the Player Pool and the log the pick to correct user
    public function update(Request $request, Draft $draft)
    {
        //$user = $request->user();
        $result = $draft->result;
        $draftRound = 1;
        $draft = $draft;

        $draftOrder = json_decode($draft->order);
        $users = $draft->league->users;

        // Info coming in
        $choice = explode(',', $request->name); // Split up the comma separated array;


        for($i = 0; $i < count($draftOrder); $i++) {

            $yourTurn = $users->where('id', '=', $draftOrder[$i])->first();

            $column = strtolower($yourTurn->name) . '_' . $draftRound;

            $updateTurn = next($draftOrder);

            if($result->$column == null) {

                //Find player on players table and mark him as drafted;
                $player = Player::where('name', $choice[0])->get()[0];
                $player->drafted = 1;
                $player->update();

                // Enter results on result table
                $result->$column = $player->id;
                $result->save();

                break;
            }
        }

        $draft->turn = $updateTurn;


        $draft->update();

        return back();
    }
}
