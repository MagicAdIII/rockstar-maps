<?php

namespace CockstarGays\Http\Controllers\Admin\Maps;

use Illuminate\Http\Request;

use CockstarGays\Http\Requests;
use CockstarGays\Models\Maps\MarkerGroup;
use CockstarGays\Http\Controllers\CrudController;

class MarkerGroupController extends CrudController
{
    /**
     * Name of the Model and From Request classes.
     *
     * @var string
     */
    protected static $modelClass = MarkerGroup::class;
    protected static $validationClass = MarkerGroupRequest::class;
}
