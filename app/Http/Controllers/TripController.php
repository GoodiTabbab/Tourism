<?php

namespace App\Http\Controllers;
use App\Models\Trip;

use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all(); 
        return response()->json([
            'success' => true,
            'data' => $trips
        ]);
    }


   
    public function destroy($id)
{
    $trip = Trip::find($id);

    if (!$trip) {
        return response()->json([
            'success' => false,
            'message' => 'الرحلة غير موجودة'
        ], 404);
    }

    $trip->delete();

    return response()->json([
        'success' => true,
        'message' => 'تم الحذف بنجاح'
    ]);
}
 

    
public function update(Request $request, $id)
{
    $request->validate([
        'time' => 'required|string',
        'date' => 'required|date',
        'ticket_price' => 'required|string',
        'location' => 'required|string',
        'flight_status' => 'required|string',
        'capacity' => 'required|integer',
        'days_number' => 'required|integer',
    ]);

    $trip = Trip::find($id);

    if (!$trip) {
        return response()->json([
            'success' => false,
            'message' => 'الرحلة غير موجودة'
        ], 404);
    }

    $trip->update([
        'time' => $request->time,
        'date' => $request->date,
        'ticket_price' => $request->ticket_price,
        'location' => $request->location,
        'flight_status' => $request->flight_status,
        'capacity' => $request->capacity,
        'days_number' => $request->days_number,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'تم تحديث الرحلة بنجاح',
        'data' => $trip
    ]);
}
    public function searchByLocation(Request $request)
    {
        $location = $request->input('location');
    
        $trips = Trip::where('location','like',"%$location%")->get();
        return response()->json([
        'success' => true,
        'data' => $trips
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'time' => 'required|string',
            'date' => 'required|date',
            'ticket_price' => 'required|string',
            'location' => 'required|string',
            'flight_status' => 'required|string',
            'capacity' => 'required|integer',
            'days_number' => 'required|integer',
        ]);
        Trip::create([
            'time' => $request->time,
            'date' => $request->date,
            'ticket_price' => $request->ticket_price,
            'location' => $request->location,
            'flight_status' => $request->flight_status,
            'capacity' => $request->capacity,
            'days_number' => $request->days_number,
        ]);
    
return response()->json([
    'success' => true]);

    }
    



}
