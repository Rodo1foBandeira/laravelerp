<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesEntity extends Model
{
    // CategoriesEntity = entidade->categorias (Relacionamentos)
    // Ex: [{"entity_id":1,"category_id":1},{"entity_id":1,"category_id":2}]
    protected $fillable =
        [
            'entity_id',
            'category_id',
        ];

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function entityCategory()
    {
        return $this->belongsTo(EntityCategory::class,'category_id');
    }
}
