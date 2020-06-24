<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = ['id','year','period','aktif'];
    protected $primaryKey = 'id';

    const NACTIVE = 0;
    const GANJIL = 1;
    const GENAP = 0;

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }

    const AKTIF_SELECT = [
        self::NACTIVE => 'Tidak Aktif',
    ];
    const validation_rules = [
                'year' => 'required',
                'period' => 'required'
            ];

    public function getAktifTextAttribute($value)
    {
        if (empty($this->aktif)) {
            return null;
        }
        return data_get(self::AKTIF_SELECT, $this->aktif, null);
    }
    const PERIODE_SELECT = [
        self::GANJIL => 'Ganjil',
        self::GENAP => 'Genap',
    ];
    public function getPeriodeTextAttribute($value)
    {
        if (empty($this->period)) {
            return null;
        }
        return data_get(self::PERIODE_SELECT, $this->period, null);
    }
     public function class_schedules()
    {
        return $this->hasMany(ClassSchedule::class);
    }

}
