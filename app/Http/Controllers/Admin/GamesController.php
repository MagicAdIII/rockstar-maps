<?php

namespace CockstarGays\Http\Controllers\Admin;

use CockstarGays\Http\Requests;
use CockstarGays\Http\Controllers\Controller;

use CockstarGays\Models\Game;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class GamesController extends Controller
{
    private $resource;
    private $model;

    public function __construct()
    {
        $this->resource = strtolower(str_plural(class_basename(Game::class)));
        $this->model = Game::class;
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $data = Game::paginate(config('settings.pagination'));
        $fields = Game::getListFields();

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
     * @return void
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {

        Game::create($request->all());

        Session::flash('flash_message', 'Game added!');

        return redirect('admin/games');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $game = Game::findOrFail($id);

        return view('games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $game = Game::findOrFail($id);

        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {

        $game = Game::findOrFail($id);
        $game->update($request->all());

        Session::flash('flash_message', 'Game updated!');

        return redirect()->route('games.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Game::destroy($id);

        Session::flash('flash_message', 'Game deleted!');

        return redirect()->route('games.index');
    }
}
