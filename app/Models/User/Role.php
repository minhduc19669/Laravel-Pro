<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table='roles';
    protected $fillable=['role_name','id'];
    public function users()
    {
        return $this->belongsToMany('App\User','role_user','role_id','user_id');
    }

    public function permissions(){
        return $this->belongsToMany('App\Models\User\Permission','role_permission', 'role_id', 'permission_id');
    }

}
