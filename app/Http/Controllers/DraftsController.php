<?php

namespace App\Http\Controllers;
use App\Player;
use App\League;
use App\Draft;
use App\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'sport' => 'required|in:mlb,nfl',
            'rounds' => 'required|numeric|min:1',
            'draft_type' => 'required|in:snake,straight'
        ]);

        $user = $request->user();
        $league = League::find($leagueId);

        if($user->isCreator($league)) {

            $draft = new Draft;
            $draft->name = $request->name;
            $draft->sport = $request->sport;
            $draft->rounds = $request->rounds;
            $draft->teams = $league->member_count;
            $draft->draft_type = $request->draft_type;
            $draft->creator_id = $user->id;
            $draft->league_id = $league->id;

            $draft->save();
            $draft->createResults($draft->id);

        } else {
            return back();
        }

        session()->flash('message', 'Please enter your missing participants.');

        return redirect("/drafts/$draft->id/participants");
    }

    // Pull up edit page
    public function edit(League $league, Draft $draft)
    {
        return view("drafts.edit", compact('draft'));
    }

    // Update Draft and send back through set up page
    public function update(Request $request, League $league, Draft $draft)
    {
        $this->validate($request, [
            'name' => 'required',
            'sport' => 'required|in:mlb,nfl',
            'rounds' => 'required|numeric|min:1',
            'draft_type' => 'required|in:snake,straight'
        ]);

        $draft->name = $request->name;
        $draft->sport = $request->sport;
        $draft->rounds = $request->rounds;
        $draft->draft_type = $request->draft_type;

        $draft->update();

        session()->flash('message', 'Please enter your missing participants.');

        return redirect("/drafts/$draft->id/participants");
    }

    // Set Draft Participants Page
    public function participants(Draft $draft)
    {
        $user = Auth::user();
        $members = $draft->league->users;

        if($user->id == $draft->creator_id) {

            // If Draft is Snake or Straight, only an order for the first round need to be set.
            if($draft->draft_type == 'snake' || 'straight') {
                $picks = Result::where([
                    ['draft_id',$draft->id],
                    ['round',1]
                ])->get();
            } else {
                $picks = Result::where('draft_id',$draft->id)->get();
            }

            return view('drafts.participants', compact('draft', 'picks', 'members'));

        } else {
            return back();
        }

    }

    // Store Draft Participants
    public function addParticipants(Request $request, Draft $draft)
    {
        $user = Auth::user();
        $results = Result::where('draft_id',$draft->id)->get();
        $rawData = $request->all();

        // Split data to team names and owners
        $team_names = [];
        $owner_ids = [];

        // For request->all, remove _method,_token, and button from the list to leave only the picks and owners.
        $count = 0;
        foreach($rawData as $key=>$data) {
            if($key != 'button' && substr($key,0,1) != '_' ) {

                // if the result is even add it to the team_name array
                // if the result is odd add i to the owner_id array
                if($count % 2 == 0) {
                    $team_names[] = $data;
                } else {
                    $owner_ids[] = $data;
                }

                $count ++;
            }
        }

        // Go through each team_name and add it's name plus the owners id
        $teams = [];
        for($i = 0; $i < count($team_names); $i++) {
            $object = new \stdClass();

            $object->team_name = $team_names[$i];
            $object->owner_id = $owner_ids[$i];

            $teams[] = $object;
        }

        dd($teams);

        // Update Result


        session()->flash('message', 'Please enter your missing participants.'); // You are here

        return back();
    }

    // Show a specific Draft Board
    public function show($leagueId, $draftId)
    {
        $draft = Draft::find($draftId);
        $users = $draft->league->users;

        return view('drafts.show', compact('draft','users'));
    }

}