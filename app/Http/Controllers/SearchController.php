<?php

namespace App\Http\Controllers;


use App\Player;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $data = Player::select('name', 'position', 'team', 'bye')
            ->where("name","LIKE","%{$request->input('query')}%")
            ->where('drafted',0)
            ->get();

        return response()->json($data);
    }
}
