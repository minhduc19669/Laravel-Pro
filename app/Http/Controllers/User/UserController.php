<?php

namespace App\Http\Controllers;
use App\News;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\ValidateFormAddUser;
use App\Http\Requests\ValidateFormUpdateUser;
use App\Role;
use App\RoleUser;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class UserController extends Controller
{
    //

	public function dashboard(){
	    $countOrder = Order::count();
        $products = Product::count();
        $news = News::count();
        return view('admin.dashboard',compact('countOrder','products','news'));
	}
	public function index(){
        $users=User::all();
        $roles=Role::all();
		return view('admin.all_user',compact('users','roles'));
	}
	public function create(){
		$roles=Role::all();
		return view('admin.add_user',compact('roles'));
	}
	public function store(ValidateFormAddUser $request){
        try{
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'address'=>$request->address,
                'password' => Hash::make($request->password)
            ]);
            $roles = $request->role;
            $user->roles()->attach($roles);
            DB::commit();
            Alert()->success('Thêm thành công !')->autoClose(1500);
            return \redirect()->route('user.list');
        }catch(\Exception $e){
            DB::rollBack();
        }
    }
    public function edit($id){
        $user=User::find($id);
        $roles=Role::all();
        $role_user=[];
        $listRoleUser=RoleUser::where('user_id',$id)->pluck('role_id');
        foreach($user->roles as $role){
            $role_user[]=$role->role_name;
        }
        return \view('admin.edit_profile',\compact('user','role_user', 'roles', 'listRoleUser'));
    }
    public function update(ValidateFormUpdateUser $request,$id){
            User::find($id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address
            ]);
            Alert()->success('Cập nhật thành công !')->autoClose(1500);
            return \redirect()->back();
	}
	public function changeRole(Request $request){
		$user_id = $request->id;
		RoleUser::where('user_id', $user_id)->delete();
            $roles = $request->role;
            User::find($user_id)->roles()->attach($roles);
            Alert()->success('Thay đổi thành công !')->autoClose(1500);
            return \redirect()->back();
    }
    public function uploadCover(Request $request,$id){
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $newFileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $cover->getClientOriginalExtension();
            $cover->storeAs('public/images', $newFileName);
            $user = User::find($id);
            $user->avatar = $newFileName;
            $user->save();
        }
        alert('Cập nhập thành công', 'Successfully', 'success')->autoClose(1500);
        return redirect()->back();
    }

    public function delete($id){
        try {
            DB::beginTransaction();
            $user=User::find($id);
            //delete user of role_user_table
            //delete role_user
            $user->roles()->detach();
            $user->delete();
            DB::commit();
            Alert()->success('Xóa thành công!')->autoClose(1500);
            return \redirect()->route('user.list');
        } catch (\Exception $e) {
            \var_dump($e->getMessage());
            DB::rollBack();
        }
    }
}

