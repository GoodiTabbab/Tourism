<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
     public function index()
    {
        $rooms = Room::all(); 
        return response()->json([
            'success' => true,
            'data' => $rooms
        ]);
    }


   
    public function destroy($id)
{
    $room = Room::find($id);

    if (!$room) {
        return response()->json([
            'success' => false,
            'message' => 'الغرفة غير موجودة'
        ], 404);
    }

    $room->delete();

    return response()->json([
        'success' => true,
        'message' => 'تم الحذف بنجاح'
    ]);
}
 

    
public function update(Request $request, $id)
{
    $request->validate([
         'type'=> 'required|string',
        'floor_number'=> 'required|string',
        'area'=> 'required|string',
        'view'=> 'required|string',
        'status'=> 'required|string', 
        'number_of_beds'=> 'required|integer',
        'price'=> 'required|string',
    ]);

    $room = Room::find($id);

    if (!$room) {
        return response()->json([
            'success' => false,
            'message' => 'الغرفة غير موجودة'
        ], 404);
    }

    $room->update([
         'type'=> $request->type,
        'floor_number'=> $request->floor_number,
        'area'=> $request->area,
        'view'=> $request->view,
        'status'=> $request->status, 
        'number_of_beds'=> $request->number_of_beds,
        'price'=> $request->price,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'تم تحديث الغرفة بنجاح',
        'data' => $room
    ]);
}
    public function searchByStatus(Request $request)
    {
        $status = $request->input('status');
    
        $rooms = Room::where('status','like',"%$status%")->get();
        return response()->json([
        'success' => true,
        'data' => $rooms
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'type'=> 'required|string',
        'floor_number'=> 'required|string',
        'area'=> 'required|string',
        'view'=> 'required|string',
        'status'=> 'required|string', 
        'number_of_beds'=> 'required|integer',
        'price'=> 'required|string',
        ]);
        Room::create([
               'type'=> $request->type,
        'floor_number'=> $request->floor_number,
        'area'=> $request->area,
        'view'=> $request->view,
        'status'=> $request->status, 
        'number_of_beds'=> $request->number_of_beds,
        'price'=> $request->price,
        ]);
    
return response()->json([
    'success' => true]);

    }
}
