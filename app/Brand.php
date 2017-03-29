<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable =
        [
            'brname'
        ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}

