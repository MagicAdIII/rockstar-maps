<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Return the Users assigned to this Role.
     *
     * @return Collection
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
