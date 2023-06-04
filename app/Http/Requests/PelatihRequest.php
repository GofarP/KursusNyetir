<?php

namespace App\Http\Requests;

use App\Enums\JenisKelamin;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class PelatihRequest extends FormRequest
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
            'alamat'=>'required|string',
            'jenis_kelamin'=>['required',new Enum(JenisKelamin::class)],
            'notelp'=>'required|string',
            'tempat_lahir'=>'required|string',
            'tanggal_lahir'=>'required|date_format:"d-m-Y"',
            'foto'=>'required|image|file|mimes:jpeg,jpg|max:500'
        ];
    }

    public function messages()
    {
        return[
            'nama.required'=>'Silahkan Isi Nama Pelatih',
            'alamat.required'=>'Silahkan Isi Alamat Pelatih',
            'jenis_kelamin.Illuminate\Validation\Rules\Enum'=>"Pilihan Jenis Kelamin Tidak Valid",
            'jenis_kelamin.required'=>"Silahkan Pilih Jenis Kelamin Pelatih",
            'notelp.required'=>"Silahkan Masukkan No Telpon Pelatih",
            'foto.required'=>'Silahkan Pilih Foto Pelatih',
            'foto.image'=>'Silahkan Pilih File Gambar',
            'foto.max'=>'Ukuran Gambar Maximal 500Mb'
        ];
    }
}
