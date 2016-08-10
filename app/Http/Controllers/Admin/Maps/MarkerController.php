<?php

namespace CockstarGays\Http\Controllers\Admin\Maps;

use Illuminate\Http\Request;

use CockstarGays\Models\Maps\Marker;
use CockstarGays\Http\Requests\MarkerRequest;
use CockstarGays\Http\Controllers\CrudController;

class MarkerController extends CrudController
{
    /**
     * Name of the Model and From Request classes.
     *
     * @var string
     */
    protected static $model = Marker::class;
    protected static $validation = MarkerRequest::class;
}
