<?php

namespace CockstarGays\Http\Controllers\Admin\Maps;

use Illuminate\Http\Request;

use CockstarGays\Http\Requests;
use CockstarGays\Models\Maps\MarkerGroup;
use CockstarGays\Http\Controllers\Controller;

class MarkerGroupController extends Controller
{
    /**
     * Name of the model class which this controller uses.
     *
     * @var string
     */
    protected static $model = MarkerGroup::class;
}
