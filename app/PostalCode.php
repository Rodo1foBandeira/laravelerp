<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostalCode extends Model
{
    protected $fillable=
    [
        'city_id',
        'code',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function entities()
    {
        return $this->belongsTo(Entity::class);
    }
}
