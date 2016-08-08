<?php

namespace CockstarGays\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use CockstarGays\Contracts\CrudInterface;

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
        $this->instance = new $this->model;
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
            'count' => $this->instance->count(),
            'data' => $this->instance->paginate(config('settings.pagination')),
            'listable' => $this->instance->listable
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

        return redirect()->route('crud.index', $this->model);
    }

    /**
     * Display the specified resource.
     *
     * @param Model
     * @return void
     */
    public function show($id)
    {
        $model = $this->instance->findOrFail($id);
        return view('crud.show', $model);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Model
     * @return void
     */
    public function edit($id)
    {
        $model = $this->instance->findOrFail($id);
        return view('crud.edit', $model);
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

        return redirect()->route('crud.index', $model);
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

        return redirect()->route('crud.index', $model);
    }

}
