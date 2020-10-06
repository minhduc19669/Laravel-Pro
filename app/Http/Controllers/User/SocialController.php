<?php

namespace App\Http\Controllers\User;
use Laravel\Socialite\Facades\Socialite;
use App\Custom;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class SocialController extends Controller
{
    //

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $finduser = Custom::where('google_id', $user->id)->first();

            if ($finduser) {
                Session::put('customer',$finduser);
                return redirect()->route('home');
            } else {
                $newUser = Custom::create([
                    'customer_name' => $user->name,
                    'customer_email' => $user->email,
                    'google_id' => $user->id,
                    'customer_avatar'=>$user->avatar,
                    'customer_password'=>Hash::make('123456')
                ]);
                Session::put('customer', $newUser);

                return redirect()->route('home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function logout(){
        Session::put('customer',\null);
        return \redirect()->route('home');
    }

}
