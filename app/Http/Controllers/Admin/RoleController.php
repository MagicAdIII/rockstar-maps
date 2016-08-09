<?php

namespace CockstarGays\Http\Controllers\Admin;

use Session;
use CockstarGays\Http\Controllers\CrudController;
use CockstarGays\Models\Role;
use Carbon\Carbon;

class RoleController extends CrudController
{

    /**
     * Set the resource and model names.
     *
     * @return void
     */
    function __construct()
    {
        $this->resource = 'roles'; // @todo
        $this->model = Role::class;
        parent::__construct();
    }
}
