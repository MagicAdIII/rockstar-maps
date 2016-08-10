<?php

namespace CockstarGays\Http\Controllers\Admin;

use Session;
use CockstarGays\Http\Controllers\CrudController;
use CockstarGays\Models\Role;
use Carbon\Carbon;

class RoleController extends CrudController
{

    /**
     * Name of the model class which this controller uses.
     *
     * @var string
     */
    protected static $model = Role::class;
}
