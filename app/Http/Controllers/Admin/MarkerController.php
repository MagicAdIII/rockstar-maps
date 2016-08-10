<?php

namespace CockstarGays\Http\Controllers\Admin;

use Illuminate\Http\Request;

use CockstarGays\Models\Marker;
use CockstarGays\Http\Requests\MarkerRequest;
use CockstarGays\Http\Controllers\CrudController;

class MarkerController extends CrudController
{
    /**
     * Name of the Model and From Request classes.
     *
     * @var string
     */
    protected static $modelClass = Marker::class;
    protected static $validationClass = MarkerRequest::class;
}
