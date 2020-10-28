<?php

namespace App\Http\Controllers;

use App\City;
use App\District;
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
            } else {
                Cart::add([
                    'id' => $id,
                    'name' => $product->product_name,
                    'qty' => 1,
                    'price' => $product->product_price - $product->product_price_sale,
                    'weight' => 10,
                    'options' => ['image' => $product->product_image]
                ]);
            }
        $count=[
            'countCart'=>Cart::count(),
            'contentCart'=>Cart::content(),
            'total'=>Cart::priceTotal(),
        ];
        return response()->json($count);
    }

    public function quick_view_product($id){
        $product=Product::findOrFail($id);
        return \response()->json($product);
    }

    public function delete($id){
        Cart::remove($id);
        $count = [
            'countCart' => Cart::count(),
            'contentCart' => Cart::content(),
            'total'=>Cart::priceTotal()
        ];
        return \response()->json($count);
    }

    public function delete_all_cart(){
        Cart::destroy();
        return \back();
    }

    public function index(){
        $data=Cart::content();
        return \view('pages.cart')->with(['data'=>$data]);
    }

    public function update($id,$qty){
        Cart::update($id, $qty);
        $data = [
            'totalPriceCart' => Cart::get($id),
            'total'=>Cart::priceTotal()
        ];
        return response()->json($data);
    }

    public function checkout(){
        $cities=City::all();
        return \view('pages.checkout',\compact('cities'));
    }
    public function add_product_folow_quantity($id,$qty){
        $product = Product::find($id);
        if ($product->price_sale == 0) {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $qty,
                'price' => $product->product_price,
                'weight' => 10,
                'options' => ['image' => $product->product_image]
            ]);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product->product_name,
                'qty' => $qty,
                'price' => $product->product_price - $product->product_price_sale,
                'weight' => 10,
                'options' => ['image' => $product->product_image]
            ]);
        }

        $count = [
            'countCart' => Cart::count(),
            'contentCart' => Cart::content(),
            'total' => Cart::priceTotal()
        ];
        return response()->json($count);
    }


}
