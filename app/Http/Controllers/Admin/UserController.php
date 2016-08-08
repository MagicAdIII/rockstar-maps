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
     * Set the resource and model names.
     *
     * @return void
     */
    function __construct()
    {
        $this->resource = 'users';
        $this->model = User::class;
        parent::__construct();
    }
}
