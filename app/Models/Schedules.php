<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    const validation_rules = [
        'start_at' => 'required',
        'day' => 'required',
        'classroom_id' => 'required',
        'end_at' => 'required',
        'room_id' => 'required',
        'period' => 'required'
    ];

    protected $table = 'class_schedules';

    protected $guarded = [];



    public function classroom()
    {
        return $this->belongsTo(classroom::class);
    }

     public function room()
    {
        return $this->belongsTo(room::class);
    }
}
