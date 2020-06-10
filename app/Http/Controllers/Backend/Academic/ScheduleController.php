<?php

namespace App\Http\Controllers\Backend\Academic;

use App\Models\ClassSchedule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Room;


class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $haris = ClassSchedule::HARI_SELECT;
        $classrooms = classroom::all()->pluck('name','id');
        $rooms = room::all()->pluck('name','id');

        return view('klp11.schedules.create', compact('classrooms','rooms','haris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $haris = ClassSchedule::HARI_SELECT;
        $request->validate(ClassSchedule::validation_rules);
        $ClassSchedules = ClassSchedule::all();
        foreach ($ClassSchedules as $cs) {
            if ($cs->day==$request->day) {
                if ($cs->room_id==$request->room_id) {
                if (strtotime($cs->start_at)<=strtotime($request->start_at) && strtotime($cs->end_at)>=strtotime($request->start_at) || strtotime($cs->start_at)<=strtotime($request->end_at) && strtotime($cs->end_at)>=strtotime($request->end_at)) {

                         notify('error', 'Ruangan Tidak Tersedia');
                         return redirect()->route('backend.schedules.create');
                    
                }
            }
            }
    }
        ClassSchedule::create($request->all());
        notify('success', 'Berhasil menambahkan data Schedules');
        return redirect()->route('backend.schedules.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
