<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Pelatih;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\PelatihRequest;
use Illuminate\Support\Facades\Storage;

class PelatihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pelatih.index',['pelatih'=>Pelatih::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelatih.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PelatihRequest $request)
    {

        $data_pelatih=$request->all();
        $data_pelatih['foto']=$request->file('foto')->store('assets/pelatih','public');

        Pelatih::create($data_pelatih);

        return redirect()->route('pelatih.index')->with('success','Sukses Menambah Pelatih Baru');

    }

    /**
     * Display the specified resource.
     */
    public function show(Pelatih $pelatih)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelatih $pelatih)
    {
        return view('admin.pelatih.edit',['pelatih'=>$pelatih]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PelatihRequest $request, Pelatih $pelatih)
    {
        $data_pelatih=$request->except(['_token','_method']);
        $data_pelatih["foto"]=$pelatih->foto;

        if($request->file('picture_path'))
        {
            Storage::disk('public')->delete($pelatih->foto);
            $data_mobil['foto']=$request->file('foto')->store('assets/pelatih','public');
        }

        Pelatih::where('id_pelatih',$pelatih->id_pelatih)->update($data_pelatih);

        return redirect()->route('mobil.index')->with('success','Sukses Mengubah Mobil Baru');;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelatih $pelatih)
    {
        $cek_pelatih=Kursus::where([
            ['id_pelatih',"=",$pelatih->id_pelatih],
            ['status',"=",'Berjalan']
        ])->first();


        if($cek_pelatih)
        {
            return back()->with('error',"Tidak Dapat Menghapus Pelatih Ini Dikarenakan Sedang Digunakan Untuk Kursus");
        }

        else
        {
            Storage::disk('public')->delete($pelatih->foto);

            Pelatih::where('id_pelatih',$pelatih->id_pelatih)->delete();

            return redirect()->route('pelatih.index')->with('success',"Sukses Menghapus Pelatih");;
        }

    }
}
