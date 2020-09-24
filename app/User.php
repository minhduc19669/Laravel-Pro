<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
<<<<<<< HEAD


=======
<<<<<<< HEAD
>>>>>>> 7f8aed56f1cb2eb03d8445e4a37f5369a39e120f
    protected $fillable = [
        'name', 'email', 'password','avatar','role_id','phone','address'
    ];

<<<<<<< HEAD

=======
=======


    protected $fillable = [
        'name', 'email', 'password','avatar','role_id','phone','address'
    ];


>>>>>>> 69558efc04f36b30aa6bbeed4512b91261b27542
>>>>>>> 7f8aed56f1cb2eb03d8445e4a37f5369a39e120f
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 7f8aed56f1cb2eb03d8445e4a37f5369a39e120f


    public function roles(){

        return $this->belongsToMany('App\Role','role_user','user_id','role_id');

    }
<<<<<<< HEAD
=======
>>>>>>> 69558efc04f36b30aa6bbeed4512b91261b27542
>>>>>>> 7f8aed56f1cb2eb03d8445e4a37f5369a39e120f
}
