<?php

namespace App\Http\Services;
use App\Http\Repositories\ProductRepo;

class ProductService {
    protected $productRepo;
    public function __construct(ProductRepo $productRepo)
    {
        $this->productRepo=$productRepo;

    }
    public function get($total){
        return $this->productRepo->get($total);
    }
    public function productDetail($id){
        return $this->productRepo->productDetail($id);
    }
    public function getImageProduct($id){
        $images= $this->productRepo->getImageOfProduct($id);
        return $images;
    }
    public function getProductRelatedTo($id){
        $products=$this->productRepo->productRelatedTo($id);
        return $products;
    }


}
