<?php

namespace CockstarGays\Http\Controllers\Admin;

use CockstarGays\Http\Requests;
use CockstarGays\Http\Controllers\Controller;

use CockstarGays\Models\Game;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class GameController extends Controller
{
    /**
     * Name of the model class which this controller uses.
     *
     * @var string
     */
    protected static $model = Game::class;
}
