<?php

namespace CockstarGays\Http\Controllers\Admin;

use Session;
use Carbon\Carbon;
use CockstarGays\Models\User;
use CockstarGays\Http\Requests\UserRequest;
use CockstarGays\Http\Controllers\CrudController;

class UserController extends CrudController
{

    /**
     * Name of the Model and From Request classes.
     *
     * @var string
     */
    protected static $model = User::class;
    protected static $validation = UserRequest::class;
}
