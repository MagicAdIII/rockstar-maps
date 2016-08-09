<?php

namespace CockstarGays\Http\Requests;

use CockstarGays\Http\Requests\Request;

class UserRequest extends Request
{

    function __construct()
    {
        dump('adfsdf');
    }

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
        // $route = $this->route()->getName();

        // if ($route === 'users.store') {
            return [
                'username' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed'
            ];
        // }

        // if ($route === 'users.update') {
        //     return [
        //         'username' => 'required|unique:users,username,' . $this->user,
        //         'email' => 'required|email|unique:users,email,' . $this->user,
        //         'password' => 'confirmed'
        //     ];
        // }
    }
}
