<?php

namespace CockstarGays\Http\Controllers;

use Validator;
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
     * Name of the resource, in lowercase plural form.
     *
     * @var string
     */
    protected $resource;

    /**
     * Name of the model class.
     *
     * @var string
     */
    protected $model;

    /**
     * Instance of the model's Form Request class.
     *
     * @var Request
     */
    protected $formRequest;

    /**
     * Name of the Request class.
     *
     * @var string
     */
    protected $requestClass;

    /**
     * Model instance.
     *
     * @var Model
     */
    private $instance;

    /**
     * Set an instance of the model.
     *
     * @return void
     */
    function __construct()
    {
        $this->requestClass = 'CockstarGays\Http\Requests\\' . class_basename($this->model) . 'Request';
        $this->formRequest = new $this->requestClass;
        $this->instance = new $this->model;

        if ( ! property_exists($this->instance, 'listable')) {
            throw new CrudException("Listable field array not found in model {$this->model}.");
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

        session()->flash('success', $this->model . ' successfully added!');

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

        session()->flash('success', $this->model . ' successfully updated!');

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

        session()->flash('success', $this->model . ' successfully deleted!');

        return redirect()->route($this->resource.'.index');
    }

}
