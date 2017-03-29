<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable =
        [
            'entity_id',
            'number',
            'pnotes',
        ];

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }
}
