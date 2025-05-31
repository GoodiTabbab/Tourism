<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addTrip(Request $request){
try{

$favoriteRequest = $request->all();
$validator= Validator::make($request->all(),[
    'user_id'=>'required|exists:users,id',
    'trip_id'=>'required|exists:trips,id'
]);

if($validator->fails()){
    return response()->json([
        'message'=>$validator->errors()->all(),
        'status'=>false
    ],400);
}
$favoriteCreate=Favorite::create([
    //'user_id' =>Auth::id(),
    'user_id'=>$request->user_id,
    'trip_id'=>$request->trip_id
]);

return response()->json([
    'message'=>'success message',
    'status'=>true
]);

}

catch(\Exception $ex){
    return response()->json([
        'messsage'=>$ex->getMessage(),
        'status'=>false
    ],500);

}
   


}




}
