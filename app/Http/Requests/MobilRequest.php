<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;
use App\Enums\JenisMobil;


class MobilRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama'=>'required|string',
            'no_polisi'=>'required|string|unique:mobil',
            'warna'=>'required|string',
            'merk'=>'required|string',
            'jenis'=>['required',new Enum(JenisMobil::class)],
            'foto'=>'required|image|file|mimes:jpeg,jpg|max:500'
        ];
    }

    public function messages()
    {
        return[
            'nama.required'=>'Silahkan Isi Nama Mobil',
            'no_polisi.required'=>'Silahkan Isi No Polisi',
            'warna.required'=>'Silahkan Isi Warna Mobil',
            'merk.required'=>'Silahkan Isi Merk Mobil',
            'jenis.required'=>"Silahkan Pilih Jenis Mobil",
            'jenis.Illuminate\Validation\Rules\Enum'=>"Pilihan Jenis Mobil Tidak Valid",
            'foto.required'=>'Silahkan Pilih Foto Anda',
            'foto.image'=>'Silahkan Pilih File Gambar',
            'foto.max'=>'Ukuran Gambar Maximal 500Mb',
        ];

    }
}
