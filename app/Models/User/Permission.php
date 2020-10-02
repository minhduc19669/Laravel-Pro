<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //

    protected $table='permissions';
    protected $fillable = ['per_name', 'display_name'];
    public function roles(){
        return $this->belongsToMany('App\Models\User\Role','role_permission','role_id', 'permission_id');
    }

}
