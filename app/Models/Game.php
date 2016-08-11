<?php

namespace CockstarGays\Models;

use Illuminate\Database\Eloquent\Model;
use CockstarGays\Models\MarkerGroup;

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

    /**
     * Get the Marker Groups associated with this game.
     *
     * @return Relationship
     */
    public function markerGroups()
    {
        return $this->hasMany(MarkerGroup::class);
    }

    /**
     * Get the markers through the MarkerGroups.
     *
     * @return Relationship
     */
    public function markers()
    {
        return $this->hasManyThrough(Marker::class, MarkerGroup::class);
    }
}
