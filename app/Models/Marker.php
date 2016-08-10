<?php

namespace CockstarGays\Models;

use CockstarGays\Models\MarkerGroup;
use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'x', 'y', 'z', 'checkable', 'active', 'marker_group_id'];

    /**
     * These fields will be listed in admin lister.
     *
     * @var array
     */
    public $listable = [
        'title',
        // 'description',
        'x',
        'y',
        'z',
        'checkable',
        'marker_group_id',
        'user_id',
        'active',
    ];

    /**
     * Get the marker's group.
     *
     * @return MarkerGroup
     */
    public function group()
    {
        return $this->belongsTo(MarkerGroup::class);
    }
}
