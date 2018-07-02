<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    // 1 SP thuộc 1 Loại SP
    public function product_type() {
    	return $this->belongsTo('App\ProductType', 'id_type', 'id');
    }

    // 1 SP có n chi tiết hoá đơn
    public function bill_detail() {
    	return $this->hasMany('App\BillDetail', 'id_product', 'id');
    }
}
