<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Peserta extends Model
{
    use HasFactory,AutoNumberTrait;

    protected $guarded = ['id_peserta'];

    protected $table='peserta';

    protected $primaryKey = 'id_peserta';

    public $incrementing = false;

    public function getAutoNumberOptions()
    {
        return [
            'id_peserta'=>[
                'format'=>'PST-?',
                'length'=>4
            ]
        ];
    }

    public function kursus()
    {
        return $this->hasMany(Kursus::class,'id_peserta');
    }
}
