<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KursusRequest extends FormRequest
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
            'id_pelatih'=>'exists:pelatih,id_pelatih',
            'id_peserta'=>'exists:peserta,id_peserta',
            'id_mobil'=>'exists:mobil,id_mobil',
            'id_paket'=>'exists:paket,id_paket',
        ];
    }


    public function messages()
    {
        return[
            // 'id_pelatih.required'=>"Silahkan Pilih Data Pelatih",
            'id_pelatih.exists'=>"Data Pelatih Tidak Valid",
            // 'id_peserta.required'=>"Silahkan Pilih Data Peserta",
            'id_peserta.exists'=>"Data Peserta Tidak Valid",
            // 'id_mobil.required'=>"Silahkan Pilih Data Mobil",
            'id_mobil.exists'=>"Data Mobil Tidak Valid",
            // 'id_paket.required'=>"Silahkan Pilih Data Paket",
            'id_mobil.exists'=>"Data Paket Tidak Valid",
        ];
    }
}
