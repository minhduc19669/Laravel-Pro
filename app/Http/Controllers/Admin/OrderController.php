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

    public function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('orders')
                    ->join('shippings','shippings.id','=','orders.shipping_id')
                    ->orWhere('order_code', 'like', '%'.$query.'%')
                    ->orWhere('shipping_name', 'like', '%'.$query.'%')
                    ->orderBy('orders.order_id', 'desc')
                    ->get();
            }
            else
            {
                $data = DB::table('orders')
                    ->join('shippings','shippings.id','=','orders.shipping_id')
                    ->orderBy('orders.order_id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $key => $row)
                {
                    $output .= '
                    <tr id=item_'.$row->order_id.'>
                    <td>'.++$key.'</td>
                     <td>'.$row->order_code.'</td>
                     <td>'.$row->shipping_name.' </td>
                      <td>'.$row->order_total.'</td>
                      ';
                    if($row->order_status == 0) {
                        $output .= '
                     <td>Chưa giao</td>
                     ';
                    }elseif ($row->order_status == 1){
                        $output .= '
                     <td>Đang giao</td>
                     ';
                    }elseif ($row->order_status == 2){
                        $output .= '
                     <td>Đã giao</td>
                     ';
                    }else{
                        $output .= '
                     <td>Hủy đơn hàng</td>
                     ';
                    }

                $output .= '
                     <td><a href='.route('order.edit',$row->order_id).'><button class="btn  btn-dark" type="submit">Chi tiết</button></a>  <button id="delete"  data-id="'.$row->order_id .'" class="btn  btn-danger delete" type="submit">xóa</button> </td>
                    </tr>
                    ';}
            }
            else
            {
                $output = '
                   <tr>
                    <td align="center" colspan="5">No Data Found</td>
                   </tr>
                   ';}
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }

}
