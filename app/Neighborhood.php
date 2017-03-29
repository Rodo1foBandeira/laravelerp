<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    protected $fillable =
        [
            'neighborhood',
        ];

    public function entities()
    {
        return $this->belongsTo(Entity::class);
    }
}
