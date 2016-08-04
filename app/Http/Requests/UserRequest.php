<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\User;

class UserRequest extends Request
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

        if ($route === 'users.store') {
            return [
                'username' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed'
            ];
        }

        if ($route === 'users.update') {
            return [
                'username' => 'required|unique:users,username,' . $this->user,
                'email' => 'required|email|unique:users,email,' . $this->user,
                'password' => 'confirmed'
            ];
        }
    }
}
