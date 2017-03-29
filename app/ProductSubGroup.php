<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSubGroup extends Model
{
    protected $fillable =
        [
            'group_id',
            'psname',
        ];

    public function group()
    {
        return $this->belongsTo(ProductGroup::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
