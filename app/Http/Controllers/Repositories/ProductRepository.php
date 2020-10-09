<?php

namespace App\Http\Repositories;
use App\Product;
class ProductRepo{
        protected $product;
        public function __construct(Product $product)
        {
            $this->product=$product;

        }
        public function getAll(){
            return $this->product->all();
        }



}
