<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Subcategory extends Model
{
    //
    use SoftDeletes;

    protected $primaryKey = 'subctg_id';

    protected $dates = ['deleted_at'];
}
