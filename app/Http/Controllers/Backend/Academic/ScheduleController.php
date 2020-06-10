public function edit(ClassSchedule $schedule)
    {
        $haris = ClassSchedule::HARI_SELECT;
        $classrooms = classroom::all()->pluck('name','id');
        $rooms = room::all()->pluck('name','id');

        return view('klp11.schedules.edit', compact('schedule','classrooms','rooms','haris'));
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
                    return redirect()->route('backend.schedules.index');   
    }