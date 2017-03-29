<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable=
    [
        'country_id',
        'state',
        'iso_code_2'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public  function cities()
    {
        return $this->hasMany(City::class);
    }
}
