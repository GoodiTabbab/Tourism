<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nationality',
        'native_language',
        'other_languages',
        'start_date',
        'email',
        'phone',
        'gender',
        'image',
        'birth_date',
    ];
 public function trip()
    {
        return $this->belongsTo(TripInformation::class, 'trip_id');
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }

}
