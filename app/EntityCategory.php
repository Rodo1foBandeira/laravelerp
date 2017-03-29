<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntityCategory extends Model
{
    // EntityCategory = categoria(s) de entidade
    // Ex: [{"id":1,"category":"Cliente"},{"id":2,"category":"Fornecedor"}]
    protected $fillable =
        [
            'id',
            'category',
            'eckey',
        ];
		
	public function categoriesEntities()
	{
		return $this->belongsTo(CategoriesEntity::class);
	}
}
