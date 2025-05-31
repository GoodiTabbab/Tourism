<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cottage;

class CottageController extends Controller
{
    public function index()
    {
        $cottages= Cottage::all(); 
        return response()->json([
            'success' => true,
            'data' => $cottages
        ]);
    }


   
    public function destroy($id)
{
    $cottage = Cottage::find($id);

    if (!$cottage) {
        return response()->json([
            'success' => false,
            'message' => 'الكوخ غير موجودة'
        ], 404);
    }

    $cottage->delete();

    return response()->json([
        'success' => true,
        'message' => 'تم الحذف بنجاح'
    ]);
}
 

    
public function update(Request $request, $id)
{
    $request->validate([
        'capacity' => 'required|string',
        'view' => 'required|string',
        'price_cottages' => 'required|string',
        'amenities' => 'required|string',
        'status' => 'required|string',
        'ratings' => 'required|string',
    ]);

    $cottage = Cottage::find($id);

    if (!$cottage) {
        return response()->json([
            'success' => false,
            'message' => 'الكوخ غير موجودة'
        ], 404);
    }

    $cottage->update([
        'capacity'=> $request->capacity,
        'view'=> $request-> view,
        'price_cottages'=> $request->price_cottages,
        'amenities'=> $request->amenities,
        'status'=> $request->status,
        'ratings'=> $request->ratings,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'تم تحديث الكوخ بنجاح',
        'data' => $cottage
    ]);
}
    public function searchByStatus(Request $request)
    {
        $status = $request->input('status');
    
        $cottages = Cottage::where('status','like',"%$status%")->get();
        return response()->json([
        'success' => true,
        'data' => $cottages
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
           'capacity' => 'required|string',
        'view' => 'required|string',
        'price_cottages' => 'required|string',
        'amenities' => 'required|string',
        'status' => 'required|string',
        'ratings' => 'required|string',
        ]);
        Cottage::create([
            'capacity'=> $request->capacity,
            'view'=> $request->view,
            'price_cottages'=> $request->price_cottages,
            'amenities'=> $request->amenities,
            'status'=> $request->status,
            'ratings'=> $request->ratings,
        ]);
    
return response()->json([
    'success' => true]);

    }
}
