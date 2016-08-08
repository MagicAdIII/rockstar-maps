<?php

namespace CockstarGays\Http\Controllers;

use CockstarGays\Models\Game;
use CockstarGays\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();

        return view('home')->with([
            'games' => $games,
        ]);
    }
}
