<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
     const VALIDATION_RULES = [
        'name' => 'required'
    ];

    protected $table = 'classrooms';
    protected $guarded = [];

    public function semesters()
    {
        return $this->belongsTo(Semester::class);
    }

     public function class_schedules()
    {
        return $this->hasMany(ClassSchedule::class);
    }
}
