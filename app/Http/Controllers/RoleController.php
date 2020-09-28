<?php

namespace App\Http\Controllers;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    //

    public function index(){
        $roles=Role::all();
        return \view('admin.all_role',\compact('roles'));
    }
    public function create(){
        $permissions=Permission::all();
        return view('admin.add_role',\compact('permissions'));
    }
    public function store(Request $request){

        try {
            DB::beginTransaction();
            $role = Role::create([
                'role_name' => $request->role_name,
            ]);
            $permissions = $request->permission;
            //insert vào bảng role_permission
            $role->permissions()->attach($permissions);
            DB::commit();
            Alert()->success('Thêm thành công !')->autoClose(1500);
            return \redirect()->route('role.index');
        } catch (\Exception $e) {
            Alert()->error('Thêm thất bại !')->autoClose(1500);
            DB::rollBack();
            Log::error($e->getMessage().$e->getLine());
        }
    }
    public function edit($id){
        $permissions=Permission::all();
        $role=Role::findOrFail($id);
        $permissionsOfRole=DB::table('role_permission')->where('role_id',$id)->pluck('permission_id');
        return \view('admin.edit_role',\compact('permissions','role', 'permissionsOfRole'));
    }
    public function update(Request $request,$id){
        try {
            DB::beginTransaction();
            Role::where('id',$id)->update([
                'role_name'=>$request->role_name
            ]);
            DB::table('role_permission')->where('role_id',$id)->delete();
            $permissions = $request->permission;
            Role::find($id)->permissions()->attach($permissions);
            DB::commit();
            Alert()->success('Thêm thành công !')->autoClose(1500);
            return \redirect()->route('role.index');
        } catch (\Exception $e) {
            Alert()->error('Thêm thất bại !')->autoClose(1500);
            DB::rollBack();
            Log::error($e->getMessage() . $e->getLine());
        }
    }
    public function delete($id){
        try {
            DB::beginTransaction();
            $role = Role::find($id);
            //delete user of role_user_table
            //delete role_user
            $role->permissions()->detach();
            $role->delete();
            DB::commit();
            Alert()->success('Xóa thành công!')->autoClose(1500);
            return \redirect()->route('role.index');
        } catch (\Exception $e) {
            \abort(403);
            DB::rollBack();
            Log::error($e->getMessage() . $e->getLine());
        }
    }
}
