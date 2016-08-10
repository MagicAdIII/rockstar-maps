<?php

namespace CockstarGays\Http\Controllers\Admin\Maps;

use Illuminate\Http\Request;

use CockstarGays\Models\Maps\Marker;
use CockstarGays\Http\Requests;
use CockstarGays\Http\Controllers\Controller;

class MarkerController extends Controller
{
    /**
     * Name of the model class which this controller uses.
     *
     * @var string
     */
    protected static $model = Marker::class;
}
