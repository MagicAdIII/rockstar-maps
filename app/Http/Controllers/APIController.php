<?php

namespace CockstarGays\Http\Controllers;

use Illuminate\Http\Request;

use CockstarGays\Http\Requests;
use CockstarGays\Models\{Game, Marker, MarkerGroup};

class APIController extends Controller
{
    public function games()
    {
        $games = Game::all();

        return response()->json($games);
    }

    public function markers(Game $game)
    {
        return response()->json($game->markers);
    }

    public function markerGroups(Game $game)
    {
        return response()->json($game->markerGroups);
    }
}
