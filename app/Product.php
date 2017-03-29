<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =
        [
            'brand_id',
            'group_id',
            'subgroup_id',
            'category_id',
            'prname',
            'prdescription',
            'prcostprice',
            'prcostmed',
            'prsaleprice',
            'prsalemed',
        ];

    public function brand()
    {
        return $this->hasOne(Brand::class,'id','brand_id');
    }

    public function group()
    {
        return $this->hasOne(ProductGroup::class,'id','group_id');
    }

    public function subGroup()
    {
        return $this->hasOne(ProductSubGroup::class,'id','subgroup_id');
    }

    public function category()
    {
        return $this->hasOne(ProductCategory::class,'id','category_id');
    }

    public function productVariations()
    {
        return $this->hasMany(ProductVariation::class);
    }
}
