<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable=
    [
        'id',
        'country',
        'iso_code_2',
        'iso_code_3',
        'ddi'
    ];

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
