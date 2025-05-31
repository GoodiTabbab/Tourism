<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all(); 
        return response()->json([
            'success' => true,
            'data' => $places
        ]);
    }


   
    public function destroy($id)
{
    $place = Place::find($id);

    if (!$place) {
        return response()->json([
            'success' => false,
            'message' =>'المكان غير موجود'
        ], 404);
    }

    $place->delete();

    return response()->json([
        'success' => true,
        'message' => 'تم الحذف بنجاح'
    ]);
}
 

    
public function update(Request $request, $id)
{
    $request->validate([
       'name'=> 'required|string',
        'location'=> 'required|string',
        'picture'=> 'required|string',
        'advice'=> 'required|string',
        'about'=> 'required|string',
    ]);

    $place = Place::find($id);

    if (!$place) {
        return response()->json([
            'success' => false,
            'message' => 'المكان غير موجود'
        ], 404);
    }

    $place->update([
        'name' => $request->name,
        'location' => $request->location,
        'picture' => $request->picture,
        'advice' => $request->advice,
        'about' => $request->about,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'تم تحديث المكان بنجاح',
        'data' => $place
    ]);
}
    public function searchByName(Request $request)
    {
        $name = $request->input('name');
    
        $places = Place::where('name','like',"%$name%")->get();
        return response()->json([
        'success' => true,
        'data' => $places
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|string',
        'location'=> 'required|string',
        'picture'=> 'required|string',
        'advice'=> 'required|string',
        'about'=> 'required|string',
        ]);
        Place::create([
            'name' => $request->name,
            'location' => $request->location,
            'picture' => $request->picture,
            'advice' => $request->advice,
            'about' => $request->about,
        ]);
    
return response()->json([
    'success' => true]);

    }
}
