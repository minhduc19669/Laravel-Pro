<?php

namespace App\Http\Controllers;

use App\City;
use App\Customer;
use App\District;
use App\Http\Requests\ValidationFormCheckout;
use App\Jobs\ConfirmOrder;
use App\Mail\OrderShipped;
use App\Mail\WellcomeEmail;
use App\Order;
use App\Orderdetail;
use App\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    //

    public function confirm_order(ValidationFormCheckout $request){

        $ship=new Shipping();
        $shipping_city=City::find($request->city);
        $shipping_district=District::find($request->district);
        $shipping_city_receive=City::find($request->city_receive);
        $shipping_district_receive=District::find($request->district_receive);
        $ship->fill([
            'shipping_name'=>$request->name,
            'shipping_phone'=>$request->phone,
            'shipping_address'=>$request->address,
            'shipping_city'=>$shipping_city->name,
            'shipping_district'=>$shipping_district->name,
            'shipping_email'=>$request->email,
            'shipping_name_receive'=>$request->name_receive,
            'shipping_phone_receive'=>$request->phone_receive,
            'shipping_address_receive'=>$request->address_receive,
            'shipping_city_receive'=>$shipping_city_receive->name,
            'shipping_district_receive'=>$shipping_district_receive->name
        ]);
        $ship->save();
        $order=new Order();
        $checkout_code = substr(md5(microtime()), rand(0, 26), 5);
        if(Session::get('customer')){
            $order->fill([
                'customer_id'=>Session::get('customer')->id,
                'shipping_id'=>$ship->id,
                'order_code'=>$checkout_code,
                'order_status'=>1,
                'order_total'=>Cart::priceTotal(),
                'created_at'=>now(),
            ]);
            $order->save();
            $order_id=$order->id;
            $data = Cart::content();
            foreach ($data as $item) {
                $order_detail = new Orderdetail();
                $order_detail->fill([
                    'order_id' => $order_id,
                    'product_id' => $item->id,
                    'product_name' => $item->name,
                    'product_price' => $item->price,
                    'product_quantity' => $item->qty
                ]);
                $order_detail->save();
            }
            $id=Session::get('customer')->id;
            $customer=Customer::find($id);
            $email=$customer->customer_email;
            $name=$request->name;
			dispatch(new ConfirmOrder($email, $checkout_code,$name))->onQueue('orders')->delay(15);
            Alert()->success('Đặt hàng thành công !')->autoClose(1500);
            Cart::destroy();
        }else{
            $order->fill([
                'customer_id' => \null,
                'shipping_id' => $ship->id,
                'order_code' => $checkout_code,
                'order_status' => 1,
                'order_total' => Cart::priceTotal(),
                'created_at' => now(),
            ]);
            $order->save();
            $order_id = $order->id;
            $data = Cart::content();
            foreach ($data as $item) {
                $order_detail = new Orderdetail();
                $order_detail->fill([
                    'order_id' => $order_id,
                    'product_id' => $item->id,
                    'product_name' => $item->name,
                    'product_price' => $item->price,
                    'product_quantity' => $item->qty
                ]);
                $order_detail->save();
            }
            $email=$request->email;
            $data=$checkout_code;
            $name=$request->name;
            dispatch(new ConfirmOrder($email, $checkout_code,$name))->onQueue('orders')->delay(15);
            Alert()->success('Đặt hàng thành công !')->autoClose(1500);
            Cart::destroy();
        }
        return \view('pages.done_checkout',\compact('checkout_code'));
    }


}
