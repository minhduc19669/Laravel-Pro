<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateFormShipping;
use App\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShippingController extends Controller
{
    public function list(){
    $shipping = Shipping::all();
    return view("admin.shipping.list",compact('shipping'));

    }
    public function add(){
    return view('admin.shipping.add');
    }
public function save(ValidateFormShipping $request){
        DB::beginTransaction();
        Shipping::create([
            "shipping_name"  => $request->shipping_name,
            "shipping_phone"=>$request->shipping_phone,
            "shipping_address" => $request->shipping_address  ,
            "shipping_email" => $request->shipping_email  ,
            "shipping_name_receive" => $request->shipping_name_receive  ,
            "shipping_phone_receive" => $request-> shipping_phone_receive ,
            "shipping_address_receive" => $request->shipping_address_receive  ,
            "shipping_node" => $request->shipping_node  ,
            "shipping_information" => $request->shipping_information  ,
            "shipping_payment" => $request-> shipping_payment ,

        ]);
DB::commit();
    Alert()->success('Thêm thành công !')->autoClose(1500);
    return \redirect()->route('shipping.list');}

    public function edit($id){
        $shipping = Shipping::where('id',$id)->get();
        return view("admin.shipping.edit",compact('shipping'));
    }
    public function update(ValidateFormShipping $request,$id){
          DB::beginTransaction();
          Shipping::where('id',$id)->update([
          "shipping_name"  => $request->shipping_name,
              "shipping_phone"=>$request->shipping_phone,
              "shipping_address" => $request->shipping_address  ,
              "shipping_email" => $request->shipping_email  ,
              "shipping_name_receive" => $request->shipping_name_receive  ,
              "shipping_phone_receive" => $request-> shipping_phone_receive ,
              "shipping_address_receive" => $request->shipping_address_receive  ,
              "shipping_node" => $request->shipping_node  ,
              "shipping_information" => $request->shipping_information  ,
              "shipping_payment" => $request-> shipping_payment ,
          ]);
DB::commit();
        Alert()->success('Cập nhật  thành công !')->autoClose(1500);
        return \redirect()->route('shipping.list');

    }
    public function remove($id){
        Shipping::find($id)->delete();
        Alert()->success('Xóa  thành công !')->autoClose(1500);
        return \redirect()->route('shipping.list');
    }
    public function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('shippings')
                    ->orWhere('shipping_name', 'like', '%'.$query.'%')
                    ->orWhere('shipping_email', 'like', '%'.$query.'%')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            else
            {
                $data = DB::table('shippings')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $key => $row)
                {
                    $output .= '
        <tr id=item_'.$row->id.'>
        <td>'.++$key.'</td>
        <td>'.$row->shipping_name.'</td>
        <td>'.$row->shipping_phone.'</td>
        <td>'.$row->shipping_address.'</td>
        <td>'.$row->shipping_city.'</td>
        <td>'.$row->shipping_district.'</td>
        <td>'.$row->shipping_email.'</td>
        </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
    public function action_1(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('shippings')
                    ->orWhere('shipping_name_receive', 'like', '%'.$query.'%')
                    ->orWhere('shipping_address_receive', 'like', '%'.$query.'%')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            else
            {
                $data = DB::table('shippings')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $key => $row)
                {
                    $output .= '
        <tr id="item_'.$row->id.'">
        <td>'.++$key.'</td>
        <td>'.$row->shipping_name_receive.'</td>
        <td>'.$row->shipping_phone_receive.'</td>
        <td>'.$row->shipping_address_receive.'</td>
        <td>'.$row->shipping_city_receive.'</td>
        <td>'.$row->shipping_district_receive.'</td>
        </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }


}
