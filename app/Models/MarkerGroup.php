<?php

namespace CockstarGays\Models;

use CockstarGays\Models\Marker;
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

    /**
     * A marker group should belong to one game only.
     *
     * @return Relationship
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * Marker Groups can be nested.
     *
     * @return Relationship
     */
    // public function parent()
    // {
    //     return $this->belongsTo(MarkerGroup::class, 'parent_id');
    // }

}
