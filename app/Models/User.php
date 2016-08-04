<?php

namespace App\Models;

use App\Models\Role;
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
