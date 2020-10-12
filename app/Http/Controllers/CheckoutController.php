<?php

namespace App\Http\Controllers;

use App\Shipping;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //

    public function confirm_order(Request $request){
        \dd($request->all());
        $ship=new Shipping();
        $ship->fill([
            'shipping_name'=>$request->name,
            'shipping_phone'=>$request->phone,
            'shipping_address'=>$request->address,
            'shipping_email'=>$request->email,
            'shipping_name_receive'=>$request->name_receive
        ]);
        return \redirect()->route('cart.shipping');
    }
    public function shipping(){
        return \view('pages.shipping');
    }
}
