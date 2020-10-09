<?php

namespace App\Http\Controllers;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $productServ;
    public function __construct(ProductService $productServ)
    {
        $this->productServ=$productServ;
    }

    public function index(){
        $products= $this->productServ->getAll();
        return \view('pages.product',\compact('products'));
    }


    //
}
