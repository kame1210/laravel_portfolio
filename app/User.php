<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Billable;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'family_name', 
        'first_name', 
        'family_name_kana', 
        'first_name_kana', 
        'sex', 
        'year', 
        'month', 
        'day', 
        'zip', 
        'address1', 
        'address2', 
        'email', 
        'tel', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $primaryKey = 'user_id';

    public function carts(){
        return $this->hasMany('App\Cart', 'user_id');
    }
}
