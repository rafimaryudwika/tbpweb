<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    const VALIDATION_RULES = [
        'name' => 'required',
        'floor' => 'nullable|integer',
        'number' => 'nullable|integer'
    ];

    protected $table = 'rooms';
    protected $guarded = [];

    public function buildings()
    {
        return $this->belongsTo(Building::class);
    }

    public function class_schedules()

    {
        return $this->hasMany(ClassSchedule::class);
    }
}
