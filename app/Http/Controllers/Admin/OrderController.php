<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateFormOrder;
use App\Order;
use App\Orderdetail;
use App\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function list(){
         $order = DB::table('orders')
             ->join('shippings','shippings.id','=','orders.order_id')
             ->get();
        return view('admin.order.list',compact('order'));
    }
    public function add(){
      $shipping = DB::table('shippings')->get();
        return view('admin.order.add',['shipping'=>$shipping]);
    }
    public function save(ValidateFormOrder $request){
        DB::beginTransaction();
            Order::create([
                'shipping_id' => $request->shipping_order,
                'order_total' => $request->order_total,
                'order_status' => $request->order_status,
            ]);
        DB::commit();
        Alert()->success('Thêm thành công !')->autoClose(1500);
        return \redirect()->route('order.list');

    }
    public function edit($id){
        $order = DB::table('orders')
            ->join('shippings','shippings.id','=','orders.order_id')
            ->where('orders.order_id',$id)->get();
        $order_detail = DB::table('orders_details')
               ->join('orders','orders.order_id','=','orders_details.order_id')
              ->where('orders_details.order_id',$id)->get();

   return view('admin.order.edit',compact('order','order_detail'));

    }
    public function update(Request $request,$id){
        DB::beginTransaction();
            Order::where('order_id',$id)->update([
                'order_status' => $request->order_status,
            ]);
        DB::commit();
        Alert()->success('Cập nhật  thành công !')->autoClose(1500);
        return \redirect()->route('order.list');

    }
    public function remove($id){
        DB::beginTransaction();
        Order::where('order_id',$id)->delete();
        DB::commit();
        Alert()->success('Xóa  thành công !')->autoClose(1500);
        return \redirect()->route('order.list');    }
}
