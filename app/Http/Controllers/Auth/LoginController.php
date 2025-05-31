<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\LodinRequest;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        // ✅ تحقق من صحة البيانات
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        // ✅ بيانات تسجيل الدخول
        $credentials = $request->only('email', 'password');

        // ✅ محاولة تسجيل الدخول
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status' => false,
                'message' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة'
            ], 401);
        }

        // ✅ جلب المستخدم وإنشاء التوكن
        $user = Auth::user();

        // حذف التوكنات القديمة إن وجدت
        $user->tokens()->delete();

        // ✅ إنشاء توكن جديد
        $token = $user->createToken($request->userAgent())->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'تم تسجيل الدخول بنجاح',
            'token' => $token,
            'user' => $user
        ]);
    }
    
    /*public function login(LodinRequest $request){
    
        $credentials=[
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(auth()->attempt($credentials)){
            $user=Auth::user();
            $user->tokens()->delete();
            $success['token']=$user->createToken(request()->userAgent())->plainTextToken;
            $success['name']=$user->first_name;
            $success['success']=true;
            return response()->json($success,200);
        }
        else{
            return response()->json(['error' => 'Unauthorised'], 401);

        }

    }*/


   


}
