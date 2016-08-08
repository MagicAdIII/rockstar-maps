<?php

namespace CockstarGays\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface CrudInterface {

	public function index();
	public function create();
	public function edit($id);
	public function show($id);

	public function store(Request $request);
	public function update(Model $model, Request $request);
	public function destroy(Model $model);

}