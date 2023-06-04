<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;


class Paket extends Model
{
    use HasFactory, AutoNumberTrait;

    protected $guarded = ['id_paket'];

    protected $table='paket';

    protected $primaryKey = 'id_paket';

    public $incrementing = false;

    public function getAutoNumberOptions()
    {
        return [
            'id_paket'=>[
                'format'=>'PKT-?',
                'length'=>4
            ]
        ];
    }

    public function paket()
    {
        return $this->hasMany(Kursus::class,'id_paket');
    }

}
