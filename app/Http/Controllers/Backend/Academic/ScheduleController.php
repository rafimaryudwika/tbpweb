<?php

namespace App\Http\Controllers\Backend\Academic;

use App\Models\ClassSchedule;


use App\Models\Schedules;
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



        $class_schedules = Schedules::paginate(config('default_paginate_item', 25));
       
        return view('klp11.schedule.index', compact('class_schedules'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $haris = ClassSchedule::HARI_SELECT;

        //memanggil view tambah
       
     $classrooms = classroom::all()->pluck('id');
     $rooms = room::all()->pluck('id');
     return view('backends.schedules.create');
    }

       public function store(Request $request)
    {
     
        $request->validate(schedules::VALIDATION_RULES);
        $class_schedules = schedules::create($request->all());
        if($class_schedules)
        {
            notify('success', 'Berhasil menyimpan data kelas');
        }else{
            notify('error', 'Gagal menyimpan data kelas');
        }
        return redirect()->route('backend.schedules.show', $class_schedules->id);


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
        return view('backend.schedules.show', compact('classroom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassSchedule $schedule)
    {

        $haris = ClassSchedule::HARI_SELECT;
        $classrooms = classroom::all()->pluck('name','id');
        $rooms = room::all()->pluck('name','id');

        return view('klp11.schedules.edit', compact('schedule','classrooms','rooms','haris'))

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassSchedule $schedule)
    {

        $haris = ClassSchedule::HARI_SELECT;
        $ClassSchedules = ClassSchedule::all();
        foreach ($ClassSchedules as $cs) {
            if ($cs->day==$request->day) {
                if ($cs->room_id==$request->room_id) {
                if (strtotime($cs->start_at)<=strtotime($request->start_at) && strtotime($cs->end_at)>=strtotime($request->start_at) || strtotime($cs->start_at)<=strtotime($request->end_at) && strtotime($cs->end_at)>=strtotime($request->end_at)) {

                         notify('Edit Gagal!!', 'Ruangan Tidak Tersedia');
                         return redirect()->route('backend.schedules.edit');
                    
                }
                else{
                    $schedule->update($request->only(
                    'classroom_id',
                    'day',
                    'room_id',
                    'start_at',
                    'end_at',
                    'period'
                ));
                    notify('success', 'Berhasil mengedit data Schedules2');
                    return redirect()->route('backend.schedules.index');
                }
            }
            }
    }
     $schedule->update($request->only(
                    'classroom_id',
                    'day',
                    'room_id',
                    'start_at',
                    'end_at',
                    'period'
                ));
                    notify('success', 'Berhasil mengedit data Schedules2');
      
        $request->validate(schedules::VALIDATION_RULES);
        if($class_schedules->update($request->all()))
        {
            notify('success', 'Berhasil memperbaharui data kelas');
        }else{
            notify('error', 'Gagal memperbaharui data kelas');
        }
        return redirect()->route('backend.schedules.show', $class_schedules);      
                     



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
        $schedules = ClassSchedule::find($id);
        $schedules->    delete();

        if($building->delete()){
            notify('success', 'Behasil menghapus data gedung');
        }else{
            notify('error', 'Gagal menghapus data Gedung');
        }
        return redirect()->route('backend.schedules.index');
    }
}