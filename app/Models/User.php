<?php

namespace CockstarGays\Models;

use CockstarGays\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'social_club'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * These fields will be listed in CRUD forms and tables.
     *
     * @var array
     */
    public $listable = [
        'name',
        'username',
        'email',
        'social_club',
        'role_id'
    ];

    /**
     * Returns mass assignable fields for forms.
     *
     * @todo abstract this! Will be the same in every Model!
     *
     * @return array
     */
    public function getFillable()
    {
        return [
            'name'        => ['input' => 'text', 'attributes' => null],
            'username'    => ['input' => 'text', 'attributes' => null],
            'email'       => ['input' => 'email', 'attributes' => null],
            'password'    => ['input' => 'password', 'attributes' => null],
            'social_club' => ['input' => 'text', 'attributes' => null]
        ];
    }

    /**
     * Checks user role if it's admin.
     *
     * @return boolean
     */
    public function isAdmin() {
        return $this->role_id === 1;
    }

    /**
     * Return the Users assigned to this Role.
     *
     * @return Role
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
