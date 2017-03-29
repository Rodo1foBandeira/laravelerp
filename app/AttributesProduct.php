<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributesProduct extends Model
{
    // AttributesProduct = Produto->Atributos (Relacionamentos)
    // Ex: [{"prodvar_id":1,"attribute_id":1},{"prodvar_id":1,"attribute_id":2}]
    protected $fillable =
        [
            'prodvar_id',
            'attribute_id',
        ];

    public function attribute()
    {
        return $this->hasOne(ProductAttribute::class,'id','attribute_id');
    }
}
