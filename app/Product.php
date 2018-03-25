<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    public function category(){
        return $this->belongsToMany('App\Category','category__products');
    }

    public function detail(){
        return $this->hasOne('App\ProductDetail');
    }
}
