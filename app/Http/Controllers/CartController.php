<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;

class CartController extends Controller
{
    //

    public function addCart($id){
    $product = Product::find($id);
        if ($product->price_sale == 0) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => 1,
                'price' => $product->product_price,
                'weight' => 10,
                'options' => ['image' => $product->product_image]
            ]);
        }else{
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => 1,
                'price' => $product->product_price_sale,
                'weight' => 10,
                'options' => ['image' => $product->product_image]
            ]);
        }
        $count=[
            'countCart'=>Cart::count()
        ];
        return response()->json($count);
    }
}
