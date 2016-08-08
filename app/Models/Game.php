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
    protected $fillable = ['title', 'slug'];

    /**
     * These fields will be listed in admin lister.
     *
     * @var array
     */
    public static function getListFields()
    {
        return [
            'title', 'slug'
        ];
    }

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
