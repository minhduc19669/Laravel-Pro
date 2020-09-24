<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateFormAddPosition;
use App\Http\Requests\ValidateFormAddUser;
use App\Role;
use App\RoleUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    //
    public function getAllMember()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.all_member', compact('users', 'roles'));
    }

    public function showProfile()
    {
        return view('admin.profile');
    }

    public function addMember()
    {
        $role = Role::whereNotIn('id', [1])->get();
        return view('admin.add_member', compact('role'));
    }

    public function storeMember(ValidateFormAddUser $request)
    {
        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
        ]);
        $user = User::orderBy('id', 'desc')->limit(1)->get();
        foreach ($user as $value) {
            $user_id = $value->id;
            $role_id = $request->role;
            RoleUser::create([
                'user_id' => $user_id,
                'role_id' => $role_id
            ]);
        }
        Alert()->success('Thêm thành công !')->autoClose(1500);
        return \redirect()->route('admin.get_all_member');
    }


    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'admin_password' => 'required',
        ]);
        $admin_name = $data['email'];
        $admin_password = $data['admin_password'];
        $user = User::where('email', $admin_name)->where('password', $admin_password)->first();
        if ($user) {
            $user_role = RoleUser::where('user_id', $user->id)->get();
            $role_id=[];
            foreach ($user_role as $value){
                array_push($role_id,$value->role_id);
            }
            Session::put('admin_name', $user->name);
            Session::put('admin_id', $user->id);
            Session::put('role_id', $role_id);
            Alert()->success('Đăng nhập thành công !')->autoClose(1500);
            return \redirect()->route('admin.dashboard');
        } else {
            Session::put('message', 'Mật khẩu hoặc tài khoản bị sai. Làm ơn nhập lại');
            return \redirect()->route('login');
        }
    }

    public function changeRoleMember(Request $request)
    {
        $user_id = $request->id;
        $role_id = $request->role;
        $user_role = RoleUser::where('user_id', $user_id)->where('role_id', $role_id)->first();
        if ($user_role) {
            Alert()->error('Thay đổi thất bại', 'Nhân viên đang ở vị trí này!');
        } else {
            RoleUser::create([
                'user_id' => $user_id,
                'role_id' => $role_id
            ]);
            Alert()->success('Thêm thành công !')->autoClose(1500);
        }
        return \redirect()->route('admin.get_all_member');
    }

    public function index()
    {
        return view('admin_login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Session::put('admin', null);
        return \redirect()->route('login');
    }

    public function editProfile($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.profile', compact('user'));
    }
    public function uploadAvatar(Request $request,$id){
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

    public function addRole()
    {
        return view('admin.add_position');
    }

    public function storeRole(ValidateFormAddPosition $request)
    {
        Role::create([
            'role_name' => $request->position
        ]);
        Alert()->success('Them chuc vu thanh cong !')->autoClose(1500);
        return \redirect()->route('admin.dashboard');
    }

    public function deleteRole($id,$role){
        RoleUser::where('user_id',$id)->where('role_id',$role)->delete();
        Alert()->success('Xóa chức vụ thành công !')->autoClose(1500);
        return \redirect()->route('admin.get_all_member');
    }


}
