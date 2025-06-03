<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip_Activity extends Model
{
    use HasFactory;
    public function trip()
    {
        return $this->belongsTo(TripInformation::class, 'trip');
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity');
    }
}


