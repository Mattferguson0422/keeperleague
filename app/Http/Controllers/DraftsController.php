<?php

namespace App\Http\Controllers;
use App\Player;
use App\League;
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

    // Create a Draft
    public function create($leagueId)
    {
        return view('drafts.create', compact('leagueId'));
    }

    // Store a Draft
    public function store(Request $request, $leagueId)
    {
        $this->validate($request, [
            'name' => 'required',
            'sport' => 'required',
            'rounds' => 'required',
            'teams' => 'required'
        ]);

        $user = $request->user();
        $league = League::find($leagueId);

        if($user->isCreator($league)) {

            $draft = new Draft;
            $draft->name = $request->name;
            $draft->sport = $request->sport;
            $draft->rounds = $request->rounds;
            $draft->teams = $request->teams;
            $draft->creator_id = $user->id;
            $draft->league_id = $league->id;

            // Set an initial order
            $order = [];
            // Go through draft participants and first list league members,
            // but if there are more draft teams than league member list a generic name
            for($i = 0; $i < $draft->teams; $i++) {

                if(isset($league->users[$i])) {
                    $order[] = $league->users[$i]->name;
                } else {
                    $t = $i + 1;
                    $order[] = "Team $t";
                }
            }

            $draft->order = json_encode($order);

            $draft->save();

        } else {
            return back();
        }

        session()->flash('message', 'Please set your draft order');

        return redirect("/drafts/$draft->id/order");
    }

    // Set Draft Order for Draft
    public function order(Draft $draft)
    {
        $order = json_decode($draft->order);

        return view('drafts.order', compact('draft', 'order'));
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
