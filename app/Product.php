<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['product_name','slug','description','price','product_image'];

    public function category(){
        return $this->belongsToMany('App\Category','category__products');
    }

    public function detail(){
        return $this->hasOne('App\ProductDetail');
    }
}
