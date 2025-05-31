<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CottageController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BookingController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[RegisterController::class,'register']);
Route::post('login',[LoginController::class,'login']);
Route::get('show_trip',[TripController::class,'index']);
Route::post('delete_trip/{id}',[TripController::class,'destroy']);
Route::post('update_trip/{id}',[TripController::class,'update']);
Route::get('search_trip',[TripController::class,'searchByLocation']);
Route::post('insert_trip',[TripController::class,'store']);
Route::post('add_to_favorite',[FavoriteController::class,'addTrip']);//صحيح
//Route::middleware('auth:sanctum')->post('add_to_favorite', [FavoriteController::class, 'addTrip']);//هناك مشاكل
Route::get('show_type',[TypeController::class,'index']);
Route::post('delete_type/{id}',[TypeController::class,'destroy']);
Route::post('update_type/{id}',[TypeController::class,'update']);
Route::get('search_type',[TypeController::class,'searchByName']);
Route::post('insert_type',[TypeController::class,'store']);
//
Route::get('show_cottage',[CottageController::class,'index']);
Route::post('delete_cottage/{id}',[CottageController::class,'destroy']);
Route::post('update_cottage/{id}',[CottageController::class,'update']);
Route::get('search_cottage',[CottageController::class,'searchByStatus']);
Route::post('insert_cottage',[CottageController::class,'store']);
//
Route::get('show_guide',[GuideController::class,'index']);
Route::post('delete_guide/{id}',[GuideController::class,'destroy']);
Route::post('update_guide/{id}',[GuideController::class,'update']);
Route::get('search_guide',[GuideController::class,'searchByName']);
Route::post('insert_guide',[GuideController::class,'store']);
//
Route::get('show_place',[PlaceController::class,'index']);
Route::post('delete_place/{id}',[PlaceController::class,'destroy']);
Route::post('update_place/{id}',[PlaceController::class,'update']);
Route::get('search_place',[PlaceController::class,'searchByName']);
Route::post('insert_place',[PlaceController::class,'store']);
//
Route::get('show_hotel',[HotelController::class,'index']);
Route::post('delete_hotel/{id}',[HotelController::class,'destroy']);
Route::post('update_hotel/{id}',[HotelController::class,'update']);
Route::get('search_hotel',[HotelController::class,'searchByLocation']);
Route::post('insert_hotel',[HotelController::class,'store']);
//
Route::get('show_room',[RoomController::class,'index']);
Route::post('delete_room/{id}',[RoomController::class,'destroy']);
Route::post('update_room/{id}',[RoomController::class,'update']);
Route::get('search_room',[RoomController::class,'searchByStatus']);
Route::post('insert_room',[RoomController::class,'store']);
//
Route::get('show_activity',[ActivityController::class,'index']);
Route::post('delete_activity/{id}',[ActivityController::class,'destroy']);
Route::post('update_activity/{id}',[ActivityController::class,'update']);
Route::get('search_activity',[ActivityController::class,'searchByName']);
Route::post('insert_activity',[ActivityController::class,'store']);
//
Route::get('show_booking',[BookingController::class,'index']);
Route::post('delete_booking/{id}',[BookingController::class,'destroy']);
Route::post('update_booking/{id}',[BookingController::class,'update']);
Route::get('search_booking',[BookingController::class,'searchByPrice']);
Route::post('insert_booking',[BookingController::class,'store']);