<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'floor_number',
        'area',
        'view',
        'status', 
        'number_of_beds',
        'price',
    ];
}
