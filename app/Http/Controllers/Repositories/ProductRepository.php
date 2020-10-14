<?php

namespace App\Http\Repositories;
use App\Product;
class ProductRepo{
        protected $product;
        public function __construct(Product $product)
        {
            $this->product=$product;

        }
        public function get($total){
            return $this->product->limit($total)->orderBy('product_id','desc')->get();
        }
        public function productDetail($id){
            return $this->product->findOrFail($id);
        }



}
