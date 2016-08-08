<?php

namespace CockstarGays\Http\Controllers;

use Illuminate\Http\Request;

use CockstarGays\Http\Requests;
use CockstarGays\Models\Game;

class APIController extends Controller
{
    public function games()
    {
        $games = Game::all();

        return response()->json($games);
    }
}
