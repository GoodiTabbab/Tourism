<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
     public function index()
    {
        $hotels = Hotel::all(); 
        return response()->json([
            'success' => true,
            'data' => $hotels
        ]);
    }


   
    public function destroy($id)
{
    $hotel= Hotel::find($id);

    if (!$hotel) {
        return response()->json([
            'success' => false,
            'message' => 'الفندق غير موجود'
        ], 404);
    }

    $hotel->delete();

    return response()->json([
        'success' => true,
        'message' => 'تم الحذف بنجاح'
    ]);
}
 

    
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string',
      'location' => 'required|string',
      'picture' => 'required|string',
      'rating' => 'required|string',
     'description' => 'required|string',
    ]);

    $hotel = Hotel::find($id);

    if (!$hotel) {
        return response()->json([
            'success' => false,
            'message' => 'الفندق غير موجودة'
        ], 404);
    }

    $hotel->update([
       'name' => $request->name,
      'location' => $request->location,
      'picture' => $request->picture,
      'rating' => $request->rating,
     'description' => $request->description,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'تم تحديث الفندق بنجاح',
        'data' => $hotel
    ]);
}
    public function searchByLocation(Request $request)
    {
        $location = $request->input('location');
    
        $hotels = Hotel::where('location','like',"%$location%")->get();
        return response()->json([
        'success' => true,
        'data' => $hotels
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
      'location' => 'required|string',
      'picture' => 'required|string',
      'rating' => 'required|string',
     'description' => 'required|string',
        ]);
        Hotel::create([
            'name' => $request->name,
      'location' => $request->location,
      'picture' => $request->picture,
      'rating' => $request->rating,
     'description' => $request->description,
        ]);
    
return response()->json([
    'success' => true]);

    }
}
