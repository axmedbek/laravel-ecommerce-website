<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = ['cart_id','order_price','banka','credit_count','status',
        'fullname','address','phone','mobile_phone'];


    public function cart(){
        return $this->belongsTo('App\Cart');
    }

}
