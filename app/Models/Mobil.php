<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;


class Mobil extends Model
{
    use HasFactory,AutoNumberTrait;

    protected $table='mobil';

    protected $guarded = [];

    protected $primaryKey = 'id_mobil';

    public $incrementing = false;

    public function getAutoNumberOptions()
    {
        return [
            'id_mobil'=>[
                'format'=>'MBL-?',
                'length'=>4
            ]
        ];
    }

    public function kursus()
    {
        return $this->hasMany(Kursus::class,'id_mobil');
    }

}
