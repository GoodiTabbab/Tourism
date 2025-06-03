<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripInformation extends Model
{
    protected $table = 'trip_information';

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function guid()
    {
        return $this->belongsTo(Guid::class, 'guid_id');
    }

    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id');
    }

    public function userTrips()
    {
        return $this->hasMany(UserTrip::class, 'trip_id');
    }

    public function tripActivities()
    {
        return $this->hasMany(TripActivity::class, 'id_trip');
    }

    public function Accommodations()
    {
        return $this->belongsTo(::class, 'guid_id');
    }

}

