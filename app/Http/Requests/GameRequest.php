<?php

namespace CockstarGays\Http\Requests;

use CockstarGays\Http\Requests\Request;

class GameRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $route = $this->route()->getName();

        if ($route === 'games.store') return [
            'title' => 'required|unique:games,title',
            'slug' => 'required|alpha_dash|unique:games,slug',
        ];

        if ($route === 'games.update') return [
            'title' => 'required|unique:games,title,' . $this->game->id,
            'slug' => 'required|alpha_dash|unique:games,slug,' . $this->game->id,
        ];

        return [];
    }
}
