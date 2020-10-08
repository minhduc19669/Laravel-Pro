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
        $content=Cart::content();
        $leng=\count($content);
        $count=[
            'countCart'=>Cart::count(),
            'contentCart'=>Cart::content(),
            'length'=>$leng
        ];
        return response()->json($count);
    }

    public function quick_view_product($id){
        $product=Product::findOrFail($id);
        return \response()->json($product);
    }

    public function delete($id){
        Cart::remove($id);
        $data=Cart::content();
        return \response()->json($data);
    }


}
