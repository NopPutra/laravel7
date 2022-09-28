<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['product_name', 'description', 'brand', 'price', 'quantity', 'alert_stock'];

    public function orderdetail(){
        return $this->hasMany('App\Order_Detail');
    }
}
