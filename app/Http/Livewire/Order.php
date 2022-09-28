<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;

class Order extends Component
{
    public $orders , $products = [], $product_code; 

    public function mount(){
        $this->products = Product::all();   // include product from index.blade.php of product
    }

    public function render()
    { 
        return view('livewire.order');
    }
}
