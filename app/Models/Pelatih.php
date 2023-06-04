<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;


class Pelatih extends Model
{
    use HasFactory, AutoNumberTrait;

    protected $guarded = ['id_pelatih'];

    protected $table='pelatih';

    protected $primaryKey = 'id_pelatih';

    public $incrementing = false;

    public function getAutoNumberOptions()
    {
        return [
            'id_pelatih'=>[
                'format'=>'PLT-?',
                'length'=>4
            ]
        ];
    }

    public function kursus()
    {
        return $this->hasMany(Kursus::class,'id_pelatih');
    }

}
