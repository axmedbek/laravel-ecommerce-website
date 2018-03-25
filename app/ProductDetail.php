<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{

    protected $table = 'product_detail';

    public $timestamps = false;

    public function product(){

        return $this->belongsTo('App\Product');
    }
}
