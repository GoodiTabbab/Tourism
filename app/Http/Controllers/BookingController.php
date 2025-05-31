<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;


class BookingController extends Controller
{
     public function index()
    {
        $bookings = Booking::all(); 
        return response()->json([
            'success' => true,
            'data' => $bookings
        ]);
    }


   
    public function destroy($id)
{
    $booking = Booking::find($id);

    if (!$booking) {
        return response()->json([
            'success' => false,
            'message' => 'الحجز غير موجود'
        ], 404);
    }

    $booking->delete();

    return response()->json([
        'success' => true,
        'message' => 'تم الحذف بنجاح'
    ]);
}
 

    
public function update(Request $request, $id)
{
    $request->validate([
         'passport_number'=> 'required|string|unique:bookings,passport_number',
         'airline'=> 'required|string',
         'departure_time'=> 'required|string',
        'arrival_time'=> 'required|string',
        'departure_airport'=> 'required|string',
        'arrival_airport'=> 'required|string',
        'date_flight'=> 'required|date',
        'seat_number'=> 'required|string',
        'ticket_price'=> 'required|string',
        'allowed_baggage'=> 'required|string',
        'flight_status'=> 'required|string', 
    ]);

    $booking = Booking::find($id);

    if (!$booking) {
        return response()->json([
            'success' => false,
            'message' => 'الحجز غير موجود'
        ], 404);
    }

    $booking->update([
         'passport_number'=> $request->passport_number,
         'airline'=> $request->airline,
         'departure_time'=> $request->departure_time,
        'arrival_time'=> $request->arrival_time,
        'departure_airport'=> $request->departure_airport,
        'arrival_airport'=> $request->arrival_airport,
        'date_flight'=> $request->date_flight,
        'seat_number'=> $request->seat_number,
        'ticket_price'=> $request->ticket_price,
        'allowed_baggage'=> $request->allowed_baggage,
        'flight_status'=> $request->flight_status, 
    ]);

    return response()->json([
        'success' => true,
        'message' => 'تم تحديث الحجز بنجاح',
        'data' => $booking
    ]);
}
    public function searchByPrice(Request $request)
    {
        $price = $request->input('ticket_price');
    
        $bookings = Booking::where('ticket_price','like',"%$price%")->get();
        return response()->json([
        'success' => true,
        'data' => $bookings
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
          'passport_number'=> 'required|string|unique:bookings,passport_number',
         'airline'=> 'required|string',
         'departure_time'=> 'required|string',
        'arrival_time'=> 'required|string',
        'departure_airport'=> 'required|string',
        'arrival_airport'=> 'required|string',
        'date_flight'=> 'required|date',
        'seat_number'=> 'required|string',
        'ticket_price'=> 'required|string',
        'allowed_baggage'=> 'required|string',
        'flight_status'=> 'required|string', 
        ]);
        Booking::create([
        'passport_number'=> $request->passport_number,
        'airline'=> $request->airline,
        'departure_time'=> $request->departure_time,
        'arrival_time'=> $request->arrival_time,
        'departure_airport'=> $request->departure_airport,
        'arrival_airport'=> $request->arrival_airport,
        'date_flight'=> $request->date_flight,
        'seat_number'=> $request->seat_number,
        'ticket_price'=> $request->ticket_price,
        'allowed_baggage'=> $request->allowed_baggage,
        'flight_status'=> $request->flight_status, 
        ]);
    
return response()->json([
    'success' => true]);

    }
}
