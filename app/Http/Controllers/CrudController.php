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
    protected static $validationClass = null;
    protected static $modelClass = null;

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
    protected $model;

    /**
     * Constructor.
     *
     * @return void
     */
    function __construct()
    {
        $this->checkForErrors();

        // Initialize resource name and model instance.
        $this->resource = str_plural(strtolower(class_basename(static::$modelClass)));
        $this->model = new static::$modelClass;

        $this->bindValidation();
        $this->bindVariables();
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        return view('crud.index')->with([
            'items' => $this->model->paginate(config('settings.pagination'))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('crud.create')->withItem($this->model);
    }

    /**
     * Store a newly created resource in database.
     *
     * @param Request
     * @return void
     */
    public function store(Request $request)
    {
        $this->model->create($request->all());

        session()->flash('messages.success', class_basename(static::$modelClass) . ' successfully added!');

        return redirect()->route($this->resource.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Model
     * @return void
     */
    public function show(Model $item)
    {
        return view('crud.show')->withItem($item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Model
     * @return void
     */
    public function edit(Model $item)
    {
        return view('crud.edit')->withItem($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Model
     * @param Request
     * @return void
     */
    public function update(Model $item, Request $request)
    {
        $item->update($request->all());

        session()->flash('messages.success', class_basename(static::$modelClass) . ' successfully updated!');

        return redirect()->route($this->resource.'.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Model
     * @return void
     */
    public function destroy(Model $item)
    {
        $item->delete();

        session()->flash('messages.success', class_basename(static::$modelClass) . ' successfully deleted!');

        return redirect()->route($this->resource.'.index');
    }

    /**
     * Check for any errors while using CrudController.
     *
     * @throws CrudException
     * @return void
     */
    private function checkForErrors() {

        // Check if the model class has been given in the Controller.
        if ( ! static::$modelClass) {
            throw new CrudException("Model has not been defined in " . get_called_class());
        }

        // Check if the listable fields array has been given in the Model.
        else if ( ! property_exists((new static::$modelClass), 'listable')) {
            throw new CrudException("Listable field array not found in model " . static::$modelClass);
        }

        // Check if the validation class has been given in the Controller.
        if ( ! static::$validationClass) {
            throw new CrudException("Form Request class not set in " . get_called_class());
        }
    }

    /**
     * Bind proper Form Request class when typehinting Request.
     * @todo Find out if this should go in Service Provider?
     *
     * @return void
     */
    private function bindValidation() {
        app()->bind(Request::class, function ($app) {
            return $app->make(static::$validationClass);
        });
    }

    /**
     * Add variables to CRUD views.
     * @todo Find out if this should go in Service Provider?
     *
     * @return void
     */
    private function bindVariables() {
        view()->composer('crud.*', function ($view) {
            $view->with('resource', $this->resource);
            $view->with('model', $this->model);
        });
    }

}
