<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    protected $primaryKey = 'like_id';

    protected $fillable = [
        'user_id',
        'item_id'
    ];

    public function item()
    {
        return $this->hasMany('App\Item', 'item_id', 'item_id');
    }
}
