<?php

namespace App\Models\Maps;

use App\Models\Maps\MarkerGroup;
use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'x', 'y', 'z', 'checkable', 'active', 'group_id'];

    /**
     * These fields will be listed in admin lister.
     *
     * @var array
     */
    public static function getListFields()
    {
        return [
            'title', 'description', 'x', 'y', 'z', 'checkable', 'active', 'group_id', 'user_id'
        ];
    }

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
