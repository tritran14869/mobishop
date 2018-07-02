<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";

    // 1 hoá đơn có n chi tiết hoá đơn
    public function bill_detail() {
    	return $this->hasMany('app\BillDetail', 'id_bill', 'id');
    }


    public function customer() {
    	return $this->belongsTo('app\Customer', 'id_customer', 'id');
    }
}
