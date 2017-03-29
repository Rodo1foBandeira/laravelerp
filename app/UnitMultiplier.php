<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitMultiplier extends Model
{
    protected $fillable =
        [
            'um_name',
            'um_iso_code',
            'um_multiplier',
        ];

    public function productVariations()
    {
        return $this->belongsTo(ProductVariation::class);
    }
}
