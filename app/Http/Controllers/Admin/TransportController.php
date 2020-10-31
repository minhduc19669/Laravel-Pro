<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\ValidateFormTransprot;
use App\Transport;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransportController extends Controller
{
    public function  list(){

       return view('admin.transport.list');
    }


    public function add(){
        $shipping_city  = City::all();
        return view('admin.transport.add',compact('shipping_city'));
    }
    public function save(ValidateFormTransprot $request){
    DB::beginTransaction();
       Transport::create([
           'city_id' => $request->city_receive,
           'district_id' => $request->district_receive,
           'fee'     => $request->fee
       ]);
    DB::commit();
        Alert()->success('Thêm thành công!')->autoClose(1500);
        return \redirect()->route('transport.list');

    }
    public function edit($id){
        $shipping_city  = City::all();
        $transport = Transport::with('city')->with('district')->where('id',$id)->get();
         return view('admin.transport.edit',compact('transport','shipping_city'));
    }
    public function update(ValidateFormTransprot $request ,$id){
        DB::beginTransaction();
        Transport::where('id',$id)->update([
            'city_id' => $request->city_receive,
            'district_id' => $request->district_receive,
            'fee'     => $request->fee
        ]);
        DB::commit();
        Alert()->success('Cập nhật thành công!')->autoClose(1500);
        return \redirect()->route('transport.list');

    }


    public function delete($id){
       $transport =  Transport::find($id)->delete();
       return response()->json($transport);
    }
    public function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data =Transport::join('cities','cities.id','=','transports.city_id')
                    ->join('districts','districts.id','=','transports.district_id')
                    ->orWhere('cities.name', 'like', '%'.$query.'%')
                    ->orWhere('districts.name', 'like', '%'.$query.'%')
                    ->orWhere('fee', 'like', '%'.$query.'%')
                    ->orderBy('transports.id', 'desc')
                    ->get();
            }
            else
            {
                $data = Transport::with('city')
                    ->with('district')
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
                     <td>'.$row->city->name.' </td>
                      <td>'.$row->district->name.' </td>
                     <td>'.number_format($row->fee).' vnđ</td>
                     <td><a href='.route('transport.edit',$row->id).'><button class="btn  btn-dark" type="submit">sửa</button></a>  <button id="delete"  data-id="'.$row->id .'" class="btn  btn-danger delete" type="submit">xóa</button> </td>
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
    public function showTransportInCityInDistrict($id){
                 $transport = Transport::where('district_id',$id)->select('id','fee')->get();
                 return response()->json(['transport'=>$transport,'total'=>Cart::priceTotal()]);
    }



}
