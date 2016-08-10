<?php

namespace CockstarGays\Http\Controllers\Admin;

use Session;
use CockstarGays\Http\Controllers\CrudController;
use CockstarGays\Http\Requests\RoleRequest;
use CockstarGays\Models\Role;
use Carbon\Carbon;

class RoleController extends CrudController
{

    /**
     * Name of the Model and From Request classes.
     *
     * @var string
     */
    protected static $model = Role::class;
    protected static $validation = RoleRequest::class;
}
