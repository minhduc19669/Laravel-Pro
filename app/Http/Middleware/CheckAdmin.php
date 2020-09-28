<?php

namespace App\Http\Middleware;

use App\Permission;
use Closure;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(\Illuminate\Http\Request $request, Closure $next, $permission)
    {



        //lay tat ca cac role khi user login vao he thong
        $listRoleOfUser1=DB::table('users')->join('role_user','users.id','=','role_user.user_id')->join('roles','role_user.role_id','=','roles.id')->where('users.id', Auth::id())->select('roles.*')->get()->pluck('id')->toArray();


        //lay tat ca cac permission khi user login vao he thong
        $listRoleOfUser=DB::table('roles')->join('role_permission','roles.id','=','role_permission.role_id')->join('permissions','role_permission.permission_id','=','permissions.id')->whereIn('roles.id', $listRoleOfUser1)->select('permissions.*')->get()->pluck('id');
        //lay cac man hinh tuong ung voi user
            $checkPermission = DB::table('permissions')->where("per_name", $permission)->value('id');
        // \dd($checkPermission);
        // die();

        if ($listRoleOfUser->contains($checkPermission)) {
                return $next($request);
            }
            abort(403, 'Oops ! Bạn không có quyền thực hiện thao tác này!');

    }
        //check user duoc phep vao man hinh nay
}
