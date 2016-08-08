<?php

namespace CockstarGays\Http\Controllers\Admin;

use CockstarGays\Http\Requests;
use CockstarGays\Http\Controllers\Controller;

use CockstarGays\Models\User;
use Illuminate\Http\Request;
use CockstarGays\Http\Requests\UserRequest;
use Carbon\Carbon;
use Session;

class UsersController extends Controller
{
    private $resource;
    private $model;

    public function __construct()
    {
        $this->resource = strtolower(str_plural(class_basename(User::class)));
        $this->model = User::class;
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $data = User::paginate(config('settings.pagination'));
        $fields = User::getListFields();

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
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(UserRequest $request)
    {

        User::create($request->all());

        Session::flash('flash_message', 'User added!');

        return redirect('admin/users');
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
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
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
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, UserRequest $request)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        Session::flash('flash_message', 'User updated!');

        return redirect('admin/users');
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
        User::destroy($id);

        Session::flash('flash_message', 'User deleted!');

        return redirect('admin/users');
    }
}
