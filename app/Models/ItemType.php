<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    protected $fillable = ['name', 'description'];

    public function item()
    {
        return $this->hasMany(Item::class, 'id');
    }

    public function item_user()
    {
        return $this->hasMany(ItemUser::class, 'id');
    }
}
