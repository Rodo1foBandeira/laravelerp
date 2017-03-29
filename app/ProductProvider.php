<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProvider extends Model
{
    protected $fillable =
        [
            'product_id',
            'entity_id',
        ];
}
