<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
         'name',
        'time',
        'date',
        'equipment',
    'equipment_availability',
    'age_group',
    ];
}
