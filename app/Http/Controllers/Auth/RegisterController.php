<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Http\Requests\Auth\RegisterRequest;
class RegisterController extends Controller
{
    public function register(RegisterRequest $request){
        //dd('register method called');

        $newUser=$request->validated();
        $newUser['password']=Hash::make($newUser['password']);
        $newUser['role']='user';
        $user=User::create($newUser);
        $success['token']=$user->createToken('user',['app:all'])->plainTextToken;
        $success['name']=$user->first_name;
        $success['success']=true;
        return response()->json($success,200);

        /*"first_name":"leen",
        "last_name":"tabbaa",
        "email":"leen1@gmail.com",
        "phone":"0912345679",
        "gender":"girl",
        "birth_date":"2004-1-1",
        "password":"23456789"
        */
    }
}
