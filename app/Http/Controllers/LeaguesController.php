<?php

namespace App\Http\Controllers;
use App\League;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LeaguesController extends Controller
{

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
        return view('leagues.show', compact('league', 'user'));
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
            'name' => 'required|unique:leagues'
        ]);

        $user = Auth::user();
        $league = new League;

        $league->name = $request->name;
        $league->join_key = bcrypt($request->join_key);
        $league->member_count = $request->member_count;
        $league->creator_id = $user->id;

        $league->save();

        $user->addLeague($league);

        return redirect("/leagues/$league->id");
    }

    // Edit a specific League
    public function edit(League $league)
    {
        $user = Auth::user();
        if($league == null) {
            dd('hit');
        }

        // Keep all league users from editing the league
        if($league->creator_id == $user->id) {
            return view('leagues.edit', compact('league', 'user'));
        } else {
            return back();
        }
    }

    // Update a specific League
    public function update(Request $request, League $league)
    {
        $league->update($request->all());
        return redirect("/leagues/$league->id");
    }

    // Delete a specific League
    public function destroy($league)
    {
        League::findOrFail($league)->delete();

        return redirect('/leagues');
    }
}
