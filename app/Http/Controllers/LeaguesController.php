<?php

namespace App\Http\Controllers;
use App\League;
use Illuminate\Http\Request;

class LeaguesController extends Controller
{
    // Show a specific League
    public function show(League $league)
    {
        return view('leagues.show', compact('league'));
    }
}
