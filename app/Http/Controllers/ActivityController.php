<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
     public function index()
    {
        $activities = Activity::all(); 
        return response()->json([
            'success' => true,
            'data' => $activities
        ]);
    }


   
    public function destroy($id)
{
    $activity = Activity::find($id);

    if (!$activity) {
        return response()->json([
            'success' => false,
            'message' => 'النشاط غير موجود'
        ], 404);
    }

    $activity->delete();

    return response()->json([
        'success' => true,
        'message' => 'تم الحذف بنجاح'
    ]);
}
 

    
public function update(Request $request, $id)
{
    $request->validate([
          'name'=> 'required|string',
        'time'=> 'required|string',
        'date'=> 'required|date',
        'equipment'=> 'required|string',
    'equipment_availability'=> 'required|string',
    'age_group'=> 'required|string',
    ]);

    $activity = Activity::find($id);

    if (!$activity) {
        return response()->json([
            'success' => false,
            'message' => 'النشاط غير موجود'
        ], 404);
    }

    $activity->update([
         'name'=> $request->name,
        'time'=> $request->time,
        'date'=> $request->date,
        'equipment'=> $request->equipment,
    'equipment_availability'=> $request->equipment_availability,
    'age_group'=> $request->age_group,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'تم تحديث النشاط بنجاح',
        'data' => $activity
    ]);
}
    public function searchByName(Request $request)
    {
        $name = $request->input('name');
    
        $activities = Activity::where('name','like',"%$name%")->get();
        return response()->json([
        'success' => true,
        'data' => $activities
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|string',
        'time'=> 'required|string',
        'date'=> 'required|date',
        'equipment'=> 'required|string',
    'equipment_availability'=> 'required|string',
    'age_group'=> 'required|string',
        ]);
        Activity::create([
         'name'=> $request->name,
        'time'=> $request->time,
        'date'=> $request->date,
        'equipment'=> $request->equipment,
    'equipment_availability'=> $request->equipment_availability,
    'age_group'=> $request->age_group,
        ]);
    
return response()->json([
    'success' => true]);

    }
}
