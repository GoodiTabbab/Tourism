<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Trip;

class Favorite extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function user(){
        return $this->belongsTo('User','user_id');
    }

    public function trip(){
        return $this->belongsTo('Trip','trip_id');
    }

}
