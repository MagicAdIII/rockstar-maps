<?php

namespace CockstarGays\Http\Requests;

use CockstarGays\Http\Requests\Request;

class MarkerRequest extends Request
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

        if ($route === 'markers.store') return [
            'title' => 'required',
            'x' => 'required|numeric',
            'y' => 'required|numeric',
        ];

        if ($route === 'markers.update') return [
            'title' => 'required',
            'x' => 'required|numeric',
            'y' => 'required|numeric',
        ];

        return [];
    }
}
