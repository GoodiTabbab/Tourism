<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guide;

class GuideController extends Controller
{
    public function index()
    {
        $guides = Guide::all(); 
        return response()->json([
            'success' => true,
            'data' => $guides
        ]);
    }


   
    public function destroy($id)
{
    $guide = Guide::find($id);

    if (!$guide) {
        return response()->json([
            'success' => false,
            'message' => 'المرشد السياحي غير موجودة'
        ], 404);
    }

    $guide->delete();

    return response()->json([
        'success' => true,
        'message' => 'تم الحذف بنجاح'
    ]);
}
 

    
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string',
        'nationality' => 'required|string',
        'native_language' => 'required|string',
        'other_languages' => 'required|string',
        'start_date' => 'required|date',
        'email' => 'required|string',
        'phone' => 'required|string',
        'gender' => 'nullable|string',
        'image' => 'nullable|string',
        'birth_date' => 'required|date',
    ]);

    $guide = Guide::find($id);

    if (!$guide) {
        return response()->json([
            'success' => false,
            'message' => 'الرحلة غير موجودة'
        ], 404);
    }

    $guide->update([
        'name' => $request->name,
        'nationality' => $request->nationality,
        'native_language' => $request->native_language,
        'other_languages' => $request->other_languages,
        'start_date' => $request->start_date,
        'email' => $request->email,
        'phone' => $request->phone,
        'gender' => $request->gender,
        'image' => $request->image,
        'birth_date' => $request->birth_date,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'تم تحديث الرحلة بنجاح',
        'data' => $guide
    ]);
}
    public function searchByName(Request $request)
    {
        $name = $request->input('name');
    
        $guides = Guide::where('name','like',"%$name%")->get();
        return response()->json([
        'success' => true,
        'data' => $guides
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'nationality' => 'required|string',
            'native_language' => 'required|string',
            'other_languages' => 'required|string',
            'start_date' => 'required|date',
            'email' => 'required|string|unique:guides,email',
            'phone' => 'required|string|unique:guides,phone',
            'gender' => 'nullable|string',
            'image' => 'nullable|string',
            'birth_date' => 'required|date',
        ]);
        Guide::create([
            'name' => $request->name,
        'nationality' => $request->nationality,
        'native_language' => $request->native_language,
        'other_languages' => $request->other_languages,
        'start_date' => $request->start_date,
        'email' => $request->email,
        'phone' => $request->phone,
        'gender' => $request->gender,
        'image' => $request->image,
        'birth_date' => $request->birth_date,
        ]);
    
return response()->json([
    'success' => true]);

    }
}
