<?php

namespace App\Http\Controllers;
use App\League;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LeaguesController extends Controller
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

    // Show all leagues for User;
    public function index()
    {
        $user = Auth::user();
        $leagues = $user->leagues;
        return view('leagues.index', compact('leagues','user'));
    }

    // Show a specific League
    public function show(League $league)
    {
        $user = Auth::user();
        if($user->inLeague($league)) {
            return view('leagues.show', compact('league', 'user'));
        } else {

            return redirect('/dashboard');
        }
    }

    // Create a League
    public function create()
    {
        return view('leagues.create');
    }

    // Store a League
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'join_key' => 'required',
            'member_count' => 'required|min:1|numeric'
        ]);

        $user = $request->user();
        $league = new League;

        $league->name = $request->name;
        $league->join_key = $request->join_key;
        $league->member_count = $request->member_count;
        $league->creator_id = $user->id;

        $league->save();

        $user->addLeague($league);

        session()->flash('message', 'Your League has been added');

        return redirect("/leagues/$league->id");
    }

    // Edit a specific League
    public function edit(League $league)
    {
        $user = Auth::user();

        // Keep all league users from editing the league
        if($user->isCreator($league)) {
            return view('leagues.edit', compact('league', 'user'));
        } else {
            return back();
        }
    }

    // Update a specific League
    public function update(Request $request, League $league)
    {
        $league->update($request->all());

        session()->flash('message', "$league->name has been updated");
        return redirect("/leagues/$league->id");
    }

    // Delete a specific League
    public function destroy(League $league)
    {
        // Remove all users from league
        foreach($league->users as $user) {
            $user->leagues()->detach($league);
        }

        League::findOrFail($league->id)->delete();

        session()->flash('message', "Your league has been removed");

        return redirect('/dashboard');
    }

    // Go to Join Page
    public function join()
    {
        return view('leagues.join');
    }

    // Join a League
    public function joinLeague(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'join_key' => 'required'
        ]);

        $user = Auth::user();
        $name = $request->name;
        $join_key = $request->join_key;

        $league = League::where('name', $name)->first();

        if($league == null || $join_key != $league->join_key) {

            session()->flash('alarm', "Sorry, your credentials do not match, please check with your league creator");

            return back();
        } elseif($user->inLeague($league)) {

            session()->flash('alarm', "Sorry, you are already in this league");
            return back();

        } elseif($league->member_count == count($league->users)) {

            session()->flash('alarm', "This league is currently full, please contact league creator");
            return back();

        } else {
            $user->addLeague($league);

            session()->flash('message', "You joined $league->name");
            return redirect("/leagues/$league->id");
        }
    }

    // Remove user from a specific league
    public function leave(Request $request, League $league)
    {
        $user = $request->user();

        if($user->isCreator($league)) {
            $player = User::find($request->player_id);
            $player->removeLeague($league);

            session()->flash('message', "You removed $player->name");

            return back();
        } else {
            $user->removeLeague($league);

            session()->flash('message', "You left $league->name");

            return redirect('/dashboard');
        }
    }
}
