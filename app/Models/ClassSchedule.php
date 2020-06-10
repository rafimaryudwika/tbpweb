<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{

    protected $table = 'class_schedules';

      const SENIN = 1;
      const SELASA = 2;
      const RABU = 3;
      const KAMIS = 4;
      const JUMAT = 5;
      const HARI_SELECT = [
        self::SENIN => 'Senin',
        self::SELASA => 'Selasa',
        self::RABU => 'Rabu',
        self::KAMIS => 'Kamis',
        self::JUMAT => 'Jumat',
    ];

    	public function matkul()
    	{
        	return $this->belongsTo(Classroom::class, 'classroom_id', 'id');
    	}

    	public function ruang()
    	{
        	return $this->belongsTo(Room::class, 'room_id', 'id');
    	}

    	const validation_rules = [
     			'classroom_id' => 'required',
     			'end_at' => 'required',
   				'room_id' => 'required',
  				'period' => 'required'
    		];

    protected $fillable = [ 'classroom_id', 'day', 'start_at', 'end_at', 'room_id', 'period'];



    public function classroom()
    {
        return $this->belongsTo(classroom::class);
    }

     public function room()
    {
        return $this->belongsTo(room::class);
    }

}
