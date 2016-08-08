<?php

namespace CockstarGays\Http\Controllers\Admin\Maps;

use Illuminate\Http\Request;

use CockstarGays\Http\Requests;
use CockstarGays\Models\Maps\MarkerGroup;
use CockstarGays\Http\Controllers\Controller;

class MarkerGroupController extends Controller
{
    private $resource;
    private $model;

    public function __construct()
    {
        $this->resource = strtolower(str_plural(class_basename(MarkerGroup::class)));
        $this->model = MarkerGroup::class;
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $data = MarkerGroup::paginate(config('settings.pagination'));
        $fields = MarkerGroup::getListFields();

        return view('admin.lister')->with([
            'resource' => $this->resource,
            'count' => (new $this->model)::count(),
            'data' => $data,
            'fields' => $fields
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
