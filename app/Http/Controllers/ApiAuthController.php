<?php

namespace App\Http\Controllers;

use App\Http\Traits\ApiResponseTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ApiAuthController extends Controller
{
    use ApiResponseTrait;

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $user = User::where('email',$request->email)->first();
        if($user && Hash::check($request->password,$user->password)){
            $user->tokens()->delete();
            //name ممكن يكون اسم المتصفح الي عم يبعتو 
            //userAgent();
            $token = $user->createToken('saleh')->plainTextToken;
            $data = [
                'user'=> $user,
                '$token'=>$token,
            ];
            return $this->apiResponse($data,'new token created');
        }
    return response()->json('not found',401);
    }
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email|confirmed',
            'phone'=>'required',
            'password'=>'required',
            
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>$request->password,
        ]);
            $token = $user->createToken('rawan')->plainTextToken;
            $data = [
                'user'=> $user,
                '$token'=>$token,
            ];
            return $this->apiResponse($data,'new token created');
    }
    public function logout(){

       $user= Auth::user();//جبنا معلومات اليوزر الي مسجل دخول 
       $user->tokens()->delete();

       return $this->apiResponse(null,' token deleted !'); 
    }
}
