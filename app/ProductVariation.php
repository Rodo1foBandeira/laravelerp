<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    protected $fillable =
        [
            'product_id',
            'mus_id', // default measure unit system
            'dmus_id', // dimension measure unit system
            'wmus_id', // weight measure unit system
            'um_id',
            'percaddit',
            'valaddit',
            'quantity',
            'maxqtity',
            'minqtity',
            'length',
            'width',
            'height',
            'weight',
        ];

    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }

    public function mUnitSystem() // Default measure unit system
    {
        return $this->hasOne(MUnitSystem::class,'id','mus_id');
    }

    public function dUnitSystem() // Dimension measure unit system
    {
        return $this->hasOne(MUnitSystem::class,'id','dmus_id');
    }

    public function wUnitSystem() // Weight measure unit system
    {
        return $this->hasOne(MUnitSystem::class,'id','wmus_id');
    }

    public  function  unitMultiplier()
    {
        return $this->hasOne(UnitMultiplier::class,'id','um_id');
    }

    public function attributesProducts()
    {
        return $this->hasMany(AttributesProduct::class);
    }
}
