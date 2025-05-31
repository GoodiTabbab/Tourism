<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Favorite;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'date',
        'ticket_price',
        'location',
        'flight_status',
        'capacity',
        'days_number',
    ];

    public function favorites(){
        return $this->hasMany('Favorite','trip_id');
    }
}
