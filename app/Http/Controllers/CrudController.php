<?php

namespace CockstarGays\Http\Controllers;

use CockstarGays\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;
use CockstarGays\Contracts\CrudInterface;
use CockstarGays\Exceptions\CrudException;
use Illuminate\Support\Facades\Route;

/**
 * CrudController
 *
 * Abstract class for handling the same logic across different resources.
 * Implements RESTful Create, Read, Update, Delete methods from a Contract.
 *
 * @see CockstarGays\Contracts\CrudInterface
 * @see CockstarGays\Http\Controllers
 */
abstract class CrudController extends Controller implements CrudInterface
{
    /**
     * Initialize the validation class and model variables.
     *
     * @var mixed
     */
    protected static $validation = null;
    protected static $model = null;

    /**
     * Name of the resource, in lowercase plural form.
     * (e.g. User -> users)
     *
     * @var string
     */
    protected $resource;

    /**
     * Model instance.
     *
     * @var Model
     */
    private $instance;

    /**
     * Constructor.
     *
     * @return void
     */
    function __construct()
    {
        // Check if the model class has been given in the Controller.
        if ( ! static::$model) {
            throw new CrudException("Model has not been defined in " . get_called_class());
        }

        // Initialize resource name and model instance.
        $this->resource = str_plural(strtolower(class_basename(static::$model)));
        $this->instance = new static::$model;

        // Check if the validation class has been given in the Controller.
        if ( ! static::$validation) {
            throw new CrudException("Form Request class not set in " . get_called_class());
        }

        // Bind the Model's Form Request class to this Controller's Request type.
        // @todo is this ok?
        app()->bind(Request::class, function ($app) {
            return $app->make(static::$validation);
        });

        // Check if the listable fields array has been given in the Model.
        if ( ! property_exists($this->instance, 'listable')) {
            throw new CrudException("Listable field array not found in model " . static::$model);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        return view('crud.index')->with([
            'resource' => $this->resource,
            'model' => $this->instance,
            'items' => $this->instance->paginate(config('settings.pagination'))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('crud.create')->with([
            'resource' => $this->resource,
            'model' => $this->instance,
            'fillable' => $this->instance->getFillable()
        ]);
    }

    /**
     * Store a newly created resource in database.
     *
     * @param Request
     * @return void
     */
    public function store(Request $request)
    {
        $this->instance->create($request->all());

        session()->flash('success', static::$model . ' successfully added!');

        return redirect()->route($this->resource.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Model
     * @return void
     */
    public function show(Model $model)
    {
        return view('crud.show')->with([
            'resource' => $this->resource,
            'model' => $model,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Model
     * @return void
     */
    public function edit(Model $model)
    {
        return view('crud.edit')->with([
            'resource' => $this->resource,
            'model' => $model,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Model
     * @param Request
     * @return void
     */
    public function update(Model $model, Request $request)
    {
        $model->update($request->all());

        session()->flash('success', static::$model . ' successfully updated!');

        return redirect()->route($this->resource.'.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Model
     * @return void
     */
    public function destroy(Model $model)
    {
        $model->delete();

        session()->flash('success', static::$model . ' successfully deleted!');

        return redirect()->route($this->resource.'.index');
    }

}
