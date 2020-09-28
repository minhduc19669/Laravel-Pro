<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //

    public function index(){
        $roles=Role::all();
        return \view('admin.all_role',\compact('roles'));
    }
    public function create(){
        return view('admin.add_role');
    }
    public function store(Request $request){

    }
    public function edit(Request $request,$id){

    }
    public function update(Request $request,$id){

    }
}
