<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = [];

    public function item_type()
    {
        return $this->belongsTo(ItemType::class, 'item_type_id', 'id');
    }
}
