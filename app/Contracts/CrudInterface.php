<?php

namespace CockstarGays\Contracts;

use Illuminate\Database\Eloquent\Model;
use CockstarGays\Http\Requests\Request;

interface CrudInterface {

	public function index();
	public function create();
	public function edit(Model $model);
	public function show(Model $model);

	public function store(Request $request);
	public function update(Model $model, Request $request);
	public function destroy(Model $model);

}