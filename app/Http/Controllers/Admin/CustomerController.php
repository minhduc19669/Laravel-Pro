<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\ValidateFormAddCustom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
class CustomerController extends Controller
{
    public function list()
    {
        $customer = Customer::all();
        return view('admin.customer.list', compact('customer'));
    }
    public function add(){
        return view('admin.customer.add');
    }
    public function save(ValidateFormAddCustom $request){
     DB::beginTransaction();
     Customer::create([
         'customer_name' => $request->customer_name,
         'customer_email' => $request->customer_email,
         'customer_phone' => $request->customer_phone,
         'customer_address' => $request->customer_address,
         'customer_password' => Hash::make($request->customer_password),
     ]);
      DB::commit();
        Alert()->success('Thêm thành công!')->autoClose(1500);
        return \redirect()->route('customer.list');
    }
    public function edit($id){
        $customer = Customer::where('id',$id)->get();
        return view('admin.customer.edit',compact('customer'));
    }
    public function update(ValidateFormAddCustom $request,$id){
        DB::beginTransaction();
        Customer::where('id',$id)->update([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'customer_password' => Hash::make($request->customer_password),
        ]);
        DB::commit();
        Alert()->success('Cập nhật thành công!')->autoClose(1500);
        return \redirect()->route('customer.list');
    }
    public function remove($id){
        DB::beginTransaction();
        Customer::where('id',$id)->delete();
        DB::commit();
        Alert()->success('Xóa thành công!')->autoClose(1500);
        return \redirect()->route('customer.list');
    }
    public function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('customers')
                    ->orWhere('customer_name', 'like', '%'.$query.'%')
                    ->orWhere('customer_email', 'like', '%'.$query.'%')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            else
            {
                $data = DB::table('customers')
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
                     <td>'.$row->customer_name.' </td>
                     <td> <img src="/customer/'.$row->customer_avatar.'" alt=""></td>
                     <td>'.$row->customer_email.'</td>
                     <td><button id="delete"  data-id="'.$row->id .'" class="btn  btn-danger delete" type="submit">xóa</button> </td>
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
