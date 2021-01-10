<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    protected $primarykey = 'like_id';

    protected $fillable = [
        'user_id',
        'item_id'
    ];

    public function item()
    {
        return $this->hasOne('App\Item', 'item_id');
    }
}
