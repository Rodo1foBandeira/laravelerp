<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    protected $fillable =
        [
            'pgname',
        ];

    public function subGroups()
    {
        return $this->hasMany(ProductSubGroup::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
