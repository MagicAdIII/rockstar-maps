<?php

namespace CockstarGays\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'active'];

    /**
     * These fields will be listed in CRUD forms and tables.
     *
     * @var array
     */
    public $listable = [
        'title',
        'slug',
        'active'
    ];

    /**
     * Get the route key for the model, so we can use
     * dependency injection in the route, like this: /map/gtav
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
