<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
         'passport_number',
         'airline',
         'departure_time',
        'arrival_time',
        'departure_airport',
        'arrival_airport',
        'date_flight',
        'seat_number',
        'ticket_price',
        'allowed_baggage',
        'flight_status', 
        ];
}
