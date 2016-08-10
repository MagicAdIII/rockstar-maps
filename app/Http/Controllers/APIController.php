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
        return response()->json($game->markerGroups()
            ->with(['markers' => function ($query) {
                $query->select(['marker_group_id', 'id', 'title', 'description', 'x', 'y']);
            }])
            ->get(['id', 'title']));
    }
}
