<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordered_products extends Model
{
    public function products() {
    	return $this->belongsTo('app\Product', 'id_product', 'id');
    }
}
