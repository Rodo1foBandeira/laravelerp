<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable =
        [
            'entity_id',
            'email',
            'enotes',
        ];

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }
}
