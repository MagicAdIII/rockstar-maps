<?php

namespace CockstarGays\Models\Maps;

use CockstarGays\Models\Maps\Marker;
use Illuminate\Database\Eloquent\Model;

class MarkerGroup extends Model
{

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'description', 'active', 'parent_id', 'game_id'];

    /**
     * These fields will be listed in admin lister.
     *
     * @var array
     */
    public $listable = [
        'title',
        'slug',
        'description',
        'parent_id',
        'game_id',
        'active',
    ];

    /**
     * Retrieve all the markers in a group.
     *
     * @return Collection
     */
    public function markers()
    {
        return $this->hasMany(Marker::class);
    }
}
