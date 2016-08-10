<?php

namespace CockstarGays\Http\Controllers\Admin;

use CockstarGays\Http\Requests;
use CockstarGays\Http\Controllers\CrudController;

use CockstarGays\Models\Game;
use CockstarGays\Http\Requests\GameRequest;
use Carbon\Carbon;
use Session;

class GameController extends CrudController
{
    /**
     * Name of the Model and From Request classes.
     *
     * @var string
     */
    protected static $modelClass = Game::class;
    protected static $validationClass = GameRequest::class;
}
