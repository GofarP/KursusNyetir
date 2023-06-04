<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Kursus extends Model
{
    use HasFactory, AutoNumberTrait;

    protected $guarded = ['id_kursus'];

    protected $table='kursus';

    protected $primaryKey = 'id_kursus';

    public $incrementing = false;

    public function getAutoNumberOptions()
    {
        return [
            'id_kelas'=>[
                'format'=>'KRS-?',
                'length'=>4
            ]
        ];
    }

    public function pelatih()
    {
        return $this->hasOne(Pelatih::class,'id_pelatih');
    }

    public function mobil()
    {
        return $this->hasOne(Mobil::class,'id_mobil');
    }

    public function peserta()
    {
        return $this->hasOne(Peserta::class,'id_peserta');
    }

    public function paket()
    {
        return $this->hasOne(Paket::class,'id_paket');
    }
}
