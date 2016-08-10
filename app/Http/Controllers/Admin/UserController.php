<?php

namespace CockstarGays\Http\Controllers\Admin;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use CockstarGays\Models\User;
use CockstarGays\Http\Requests;
use CockstarGays\Http\Requests\UserRequest;
use CockstarGays\Http\Controllers\CrudController;

class UserController extends CrudController
{

    /**
     * Name of the model class which this controller uses.
     *
     * @var string
     */
    protected static $model = User::class;
}
