<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use SoftDeletes;

    protected $table  = 'category';


    public function product(){
        return $this->belongsToMany('App\Product','category__products');
    }

}
