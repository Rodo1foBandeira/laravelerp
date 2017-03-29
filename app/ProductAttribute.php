<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    // ProductAttribute = Atributos de produto
    // Ex:
    //  [
    //          {"id":1,"pa_attribute":"Branco","pa_key":"cor","pa_value":"#ffffff"},
    //          {"id":2,"pa_attribute":"GG","pa_key":"tamanho","pa_value":"GG"}
    //  ]
    protected $fillable =
        [
            'pa_attribute',
            'pa_key',
            'pa_value',
        ];

    public function attributesProducts()
    {
        return $this->belongsTo(AttributesProduct::class);
    }
}
