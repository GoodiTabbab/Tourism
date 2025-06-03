<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Trip extends Model
{
    use HasFactory;
    class UserTrip extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function trip()
    {
        return $this->belongsTo(TripInformation::class, 'trip_id');
    }

    public function accommodations()
    {
        return $this->belongsToMany(Accommodations::class, 'accommodation_user_trip', 'user_trip_id', 'accommodations_id');
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'room_user_trip', 'user_trip_id', 'room_id');
    }

    public function procedures()
    {
        return $this->belongsToMany(Procedures::class, 'user_trip_procedures', 'user_trip_id', 'procedure_id');
    }

    public function bookingFlight()
    {
        return $this->hasOne(BookingFlight::class, 'user_trip_id');
    }
}}

    