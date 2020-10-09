<?php

namespace App\Http\Services;
use App\Http\Repositories\ProductRepo;

class ProductService {
    protected $productRepo;
    public function __construct(ProductRepo $productRepo)
    {
        $this->productRepo=$productRepo;

    }
    public function getAll(){
        return $this->productRepo->getAll();
    }


}
