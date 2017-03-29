<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable =
        [
            'pcname',
            'pckey',
        ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
