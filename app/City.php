<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable=
    [
        'id',
        'state_id',
        'city',
        'code',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function postalcodes()
    {
        return $this->hasMany(PostalCode::class);
    }
}
