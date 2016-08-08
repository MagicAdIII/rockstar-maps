<?php

namespace CockstarGays\Http\Controllers;

use CockstarGays\Models\Game;
use CockstarGays\Http\Requests;
use Illuminate\Http\Request;

class MapsController extends Controller
{
	/**
	 * Shows the Map homepage for a game.
	 *
	 * @param  string $game Slug of the game
	 * @return View
	 */
    public function showMap(Game $game)
    {
    	return view('maps.index')->withGame($game->slug);
    }
}
