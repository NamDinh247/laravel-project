<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderStatus(){
        return $this->belongsTo('App\Order_status', 'od_status', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'account_id', 'id');
    }

    public function order_detail(){
        return $this->hasOne('App\Order_detail', 'od_id', 'id');
    }
}
