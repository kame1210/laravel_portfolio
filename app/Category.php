<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    //
    use SoftDeletes;

    protected $primaryKey = 'ctg_id';

    protected $dates = ['deleted_at'];
}
