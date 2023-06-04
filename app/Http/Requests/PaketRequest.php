<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\Sim;
use Illuminate\Validation\Rules\Enum;

class PaketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama'=>'required|string',
            'sim'=>['required',new Enum(Sim::class)],
            'harga'=>'required|numeric',
            'pertemuan'=>'required|numeric',
        ];
    }


    public function messages()
    {
        return [
            'nama.required'=>'Silahkan Masukkan Nama Paket',
            'sim.required'=>"Silahkan Masukkan Sim",
            'sim.Illuminate\Validation\Rules\Enum'=>"Pilihan Sim Tidak Valid",
            'harga.required'=>"Silahkan Masukkan Harga Paket",
            'harga.numeric'=>'Silahkan Masukkan Harga Paket Berupa Angka',
            'pertemuan.required'=>"Silahkan Masukkan Jumlah Pertemuan",
            'pertemuan.numeric'=>"Silahkan Masukkan Jumlah Pertemuan Berupa Angka"
        ];
    }
}
