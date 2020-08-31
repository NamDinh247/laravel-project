<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public function shop(){
        return $this->belongsTo('App\Shop', 'shop_id', 'id');
    }

    public function product(){
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
