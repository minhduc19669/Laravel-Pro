<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUser extends Model
{
    //

    protected $table='role_user';
    protected $fillable=['role_id','user_id'];
}
