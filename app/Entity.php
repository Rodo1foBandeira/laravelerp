<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $fillable=
    [
        'name',
        'company',
        'type',
        'cnpj_cpf',
        'ie_rg',
        'birth_date',
        'postal_code_id',
        'neighborhood_id',
        'address',
        'address_number',
        'address_complement',
        'active',
        'notes',
    ];

    public function setBirthDateAttribute($value)
    {
        if (strpos($value,'/')==2)
        {
            $value = substr($value,6,4).'-'.substr($value,3,2).'-'.substr($value,0,2);
        }
        $this->attributes['birth_date'] = $value;
    }

    public function postalCode()
    {
        return $this->hasOne(PostalCode::class);
    }

    public function neighborhood()
    {
        return $this->hasOne(Neighborhood::class);
    }

    public function categoriesEntities()
    {
        return $this->hasMany(CategoriesEntity::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }
}
