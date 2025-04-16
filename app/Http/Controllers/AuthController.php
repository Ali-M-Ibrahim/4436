<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Register(){
        $user = new User();
        $user->name = "admin";
        $user->email="admin@hotmail.com";
        $user->password = Hash::make("123");
        $user->save();
        return "ok user created";
    }

    public function login(){
        return View("Login");
    }

    public function Check(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            return "ok authenticated";
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function Userview(){
        if(Auth::check()){
            $user = Auth::user();
            $userName= $user->name;
//            return $userName;
        }

        return View("Userview");
    }

    function logout()
    {
        Auth::logout();
        return "ok the user is logged out";

    }

}
