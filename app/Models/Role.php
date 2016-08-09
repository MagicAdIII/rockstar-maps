<?php

namespace CockstarGays\Models;

use CockstarGays\Models\User;
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
     * These fields will be listed in CRUD forms and tables.
     *
     * @var array
     */
    public $listable = [
        'name',
    ];

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
