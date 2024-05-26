<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LoginContrller extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!Hash::check($request->password, $user->password)){
            return response()->json([
                'Login Failed'
                ]);
        }
        
        $token = $user->createToken($user->username);
        
        return response()->json([
            'token' => $token->plainTextToken ,'user' =>$user
        ],200);
    }
    //---------------------------------------------------------------------------------
    
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' =>'validations fails',
                'errors'=> $validator->errors(),
            ],422);
        }
        $user=User::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=> Hash::make($request->password),
        ]);

        return response()->json([
            'message' =>'Registration successfull',
            'data'=> $user 
        ],200);
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        Redirect::route('login');
        return response()->json([
            'message' => 'logout successfull'
        ],200);
    }
}