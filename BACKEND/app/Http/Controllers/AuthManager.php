<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AuthManager extends Controller
{
    function login()
    {
        if (Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    }

    //-------------------------------------------- 
    function register()
    {
        return view('register');
    }

    //--------------------------------------------
    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (auth::attempt($credentials)) {
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error", "Login details are not valid");
    }
    //--------------------------------------------
    function registerPost(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required'
        ]);

        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if (!$user) {
            return redirect(route('register'))->with("error", "Registration failed. Please try again.");
        }
        return redirect(route('login'))->with("success", "Registration success. Please login to access your account.");
    }
    //--------------------------------------------
    public function logout()
    {
        Auth::logout();
        return Redirect::route('login');
    }

    //--------------------------------------------
    
    

}
