<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use SoftDeletes;

    protected $fillable = ['fullname','email','password','activation_code','status'];
    protected $hidden = ['password','activation_code'];



    public function userDetail(){

       return $this->hasOne('App\UserDetail');
    }
}
