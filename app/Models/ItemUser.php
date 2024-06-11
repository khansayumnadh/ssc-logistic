<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemUser extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function item_type()
    {
        return $this->belongsTo(ItemType::class, 'item_type_id', 'id');
    }
}
