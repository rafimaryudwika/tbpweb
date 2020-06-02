<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    //
    
    	protected $table = 'class_schedules';

    	public function matkul()
    	{
        	return $this->belongsTo(Classroom::class, 'classroom_id', 'id');
    	}

    	public function ruang()
    	{
        	return $this->belongsTo(Room::class, 'room_id', 'id');
    	}
    
}
