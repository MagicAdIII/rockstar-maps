<?php

namespace CockstarGays\Contracts;

use Illuminate\Database\Eloquent\Model;
use CockstarGays\Http\Requests\Request;

interface CrudInterface {

	public function index();
	public function create();
	public function edit(Model $item);
	public function show(Model $item);

	public function store(Request $request);
	public function update(Model $item, Request $request);
	public function destroy(Model $item);

}
