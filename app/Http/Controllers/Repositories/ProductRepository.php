<?php

namespace App\Http\Repositories;

use App\Brand;
use App\Product;
class ProductRepo{
        protected $product;
        protected $brand;
        public function __construct(Product $product,Brand $brand)
        {
            $this->product=$product;
            $this->brand=$brand;

        }
        public function get($total){
            return $this->product->limit($total)->orderBy('product_id','desc')->get();
        }
        public function productDetail($id){
            return $this->product->findOrFail($id);
        }
        public function getImageOfProduct($id){
            $images=$this->product->find($id)->images;
            return $images;
        }
        public function productRelatedTo($id){
        $brand = $this->productDetail($id);
        $brand_id = $brand->brands->id;
        $products=$this->product->where('brand_id', $brand_id)->whereNotIn('product_id',[$id])->get();
            return $products;
        }



}
