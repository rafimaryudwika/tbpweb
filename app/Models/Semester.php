<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = ['id','year','period','aktif'];

    const ACTIVE = 1;
    const NACTIVE = 0;
    const GANJIL = 1;
    const GENAP = 0;
  
    protected $primaryKey = 'id';
  
    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }

    const AKTIF_SELECT = [

        self::ACTIVE => 'Aktif',

        self::NACTIVE => 'Tidak Aktif',
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


    public $sortable = ['year'];
    
    protected $guarded=[];

}
