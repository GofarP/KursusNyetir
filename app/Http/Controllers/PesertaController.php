<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Peserta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PesertaRequest;
use Illuminate\Support\Facades\Storage;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.peserta.index',['peserta'=>Peserta::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.peserta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PesertaRequest $request)
    {
        $data_peserta=$request->all();
        $data_peserta['foto']=$request->file('foto')->store('assets/peserta','public');

        Peserta::create($data_peserta);

        return redirect()->route('peserta.index')->with('success','Sukses Menambah Peserta Baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peserta $peserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peserta $peserta)
    {
        return view('admin.peserta.edit',['peserta'=>$peserta]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peserta $peserta)
    {
        $data_peserta=$request->except(['_token','_method']);
        $data_peserta["foto"]=$peserta->foto;

        if($request->file('picture_path'))
        {
            Storage::disk('public')->delete($peserta->foto);
            $data_mobil['foto']=$request->file('foto')->store('assets/peserta','public');
        }

        Peserta::where('id_peserta',$peserta->id_peserta)->update($data_peserta);

        return redirect()->route('peserta.index')->with('success','Sukses Mengubah Data Peserta');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peserta $peserta)
    {
        $cek_peserta=Kursus::where([
            ['id_peserta',"=",$peserta->id_peserta],
            ['status',"=",'Berjalan']
        ])->first();


        if($cek_peserta)
        {
            return back()->with('error',"Tidak Dapat Menghapus Peserta Ini Dikarenakan Sedang Mengikuti Untuk Kursus");
        }

        else
        {
            Storage::disk('public')->delete($peserta->foto);

            Peserta::where('id_peserta',$peserta->id_peserta)->delete();

            return redirect()->route('peserta.index')->with('success',"Sukses Menghapus Peserta");;
        }
    }
}
