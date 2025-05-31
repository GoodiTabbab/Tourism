<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all(); 
        return response()->json([
            'success' => true,
            'data' => $types
        ]);
    }


    public function destroy($id)
    {
        $type= Type::find($id);
    
        if (!$type) {
            return response()->json([
                'success' => false,
                'message' => 'النوع غير موجودة'
            ], 404);
        }
    
        $type->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'تم الحذف بنجاح'
        ]);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string',
    ]);

    $type = Type::find($id);

    if (!$type) {
        return response()->json([
            'success' => false,
            'message' => 'النوع غير موجودة'
        ], 404);
    }

    $type->update([
        'name' => $request->name,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'تم تحديث النوع بنجاح',
        'data' => $type
    ]);
}

public function searchByName(Request $request)
{
    $name = $request->input('name');

    $type= Type::where('name','like',"%$name%")->get();
    return response()->json([
    'success' => true,
    'data' => $type
    ]);
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|unique:types,name',
    ]);
    Type::create([
        'name' => $request->name,
    ]);

return response()->json([
'success' => true]);

}

}
