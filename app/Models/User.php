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
        'name', 'username', 'email', 'password', 'social_club', 'active'
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
        'role_id',
        'active'
    ];

    /**
     * Checks user role if it's admin.
     *
     * @return boolean
     */
    public function isAdmin() {
        return $this->role_id === 1;
    }

    /**
     * Checks if user is banned (= not active).
     *
     * @return boolean
     */
    public function isBanned() {
        return false === $this->active;
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
