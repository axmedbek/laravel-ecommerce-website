<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    //

    use SoftDeletes;


    protected $guarded = [];

    public function order(){
        $this->hasOne('App\Order');
    }

    public static function active_cart_id(){

    }
}
