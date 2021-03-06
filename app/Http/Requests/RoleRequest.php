<?php

namespace CockstarGays\Http\Requests;

use CockstarGays\Http\Requests\Request;

class RoleRequest extends Request
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

        if ($route === 'roles.store') return [
            'name' => 'required|unique:roles,name',
        ];

        if ($route === 'roles.update') return [
            'name' => 'required|unique:roles,name,' . $this->role->id,
        ];

        return [];
    }
}
