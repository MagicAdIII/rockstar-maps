<?php

namespace CockstarGays\Models;

use Baum\Node;
use CockstarGays\Models\Marker;
use Illuminate\Database\Eloquent\Model;

class MarkerGroup extends Node
{

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'marker_groups';

    //
    // This is to support "scoping" which may allow to have multiple nested
    // set trees in the same database table.
    //
    // You should provide here the column names which should restrict Nested
    // Set queries. f.ex: company_id, etc.
    //

    // /**
    //  * Columns which restrict what we consider our Nested Set list
    //  *
    //  * @var array
    //  */
    // protected $scoped = array();

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'description', 'active', 'game_id'];

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
     * Get Games for select lists.
     *
     * @return array
     */
    public function selectGames()
    {
        return Game::pluck('title', 'id')->prepend('Please Select')->toArray();
    }

    /**
     * Get select list for nested structure.
     *
     * @return array
     */
    public function selectParent()
    {
        return ['None'] + $this->getNestedList('title', 'id', '---');
    }

}
