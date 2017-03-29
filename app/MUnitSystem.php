<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MUnitSystem extends Model
{
    protected $fillable =
        [
            'unit',
            'iso_code',
            'measure',
        ];

    public function productVariations()
    {
        return $this->belongsTo(ProductVariation::class);
    }
}
