<?php

namespace CockstarGays\Http\Requests;

use CockstarGays\Http\Requests\Request;

class MarkerGroupRequest extends Request
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

        if ($route === 'markergroups.store') return [
            'title' => 'required',
            'slug' => 'required|unique:marker_groups,slug',
            'game_id' => 'exists:games,id',
            'parent_id' => 'sometimes',
        ];

        if ($route === 'markergroups.update') return [
            'title' => 'required',
            'slug' => 'required|unique:marker_groups,slug,' . $this->markergroup->id,
            'game_id' => 'exists:games,id',
            'parent_id' => 'sometimes',
        ];

        return [];
    }
}
