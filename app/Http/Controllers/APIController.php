<?php

namespace CockstarGays\Http\Controllers;

use Illuminate\Http\Request;

use CockstarGays\Http\Requests;
use CockstarGays\Models\{Game, Marker, MarkerGroup};

class APIController extends Controller
{
    public function games()
    {
        return response()->json(Game::all());
    }

    public function markers(Game $game)
    {
        return response()->json($game->markers);
    }

    public function markerGroups(Game $game)
    {
        return response()->json($game->markerGroups);
    }

    public function tree(Game $game)
    {
        $groups = $game->markerGroups->toHierarchy()->values()->toArray();
        return response()->json($groups);
    }
}
