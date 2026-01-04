<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Schedule::with('doctor')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'medic_id'=>'required|exists:doctors,id',
            'day_of_week'=>'required|integer|min:0|max:6',
            'start_time'=>'required',
            'end_time'=>'required|after:start_time'
        ]);
        $schedule=Schedule::create($request->all());
        return response()->json($schedule,201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return Schedule::with('doctor')->findOrFail($id);

        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $schedule=Schedule::findOrFail($id);
        $schedule->update($request->all());
        return response()->json($schedule);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule=Schedule::findOrFail($id);
        $schedule->delete();
        return response()->json(['message' => 'Horario eliminado']);
    }
}
