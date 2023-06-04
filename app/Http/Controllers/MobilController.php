<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Kursus;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\MobilRequest;
use Illuminate\Support\Facades\Storage;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.mobil.index',["mobil"=>Mobil::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mobil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MobilRequest $request)
    {
        $data_mobil=$request->all();
        $data_mobil['foto']=$request->file('foto')->store('assets/mobil','public');

        Mobil::create($data_mobil);

        return redirect()->route('mobil.index')->with('success','Sukses Menambah Mobil Baru');

    }

    /**
     * Display the specified resource.
     */
    public function show(Mobil $mobil)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mobil $mobil)
    {
        return view('admin.mobil.edit',["mobil"=>$mobil]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mobil $mobil)
    {
        $request->validate([
            'no_polisi'=>'required|unique:mobil,id_mobil,'.$mobil->no_polisi.',no_polisi',
        ]);

        $data_mobil=$request->except(['_token','_method']);

        $data_mobil["foto"]=$mobil->foto;

        if($request->file('picture_path'))
        {
            Storage::disk('public')->delete($mobil->foto);
            $data_mobil['foto']=$request->file('foto')->store('assets/mobil','public');
        }


        Mobil::where('id_mobil',$mobil->id_mobil)->update($data_mobil);

        return redirect()->route('mobil.index')->with('success','Sukses Mengubah Mobil Baru');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobil $mobil)
    {
        $cek_mobil=Kursus::where([
            ['id_mobil',"=",$mobil->id_mobil],
            ['status',"=",'Berjalan']
        ])->first();


        if($cek_mobil)
        {
            return back()->with('error',"Tidak Dapat Menghapus Mobil Ini Dikarenakan Sedang Digunakan Untuk Kursus");
        }

        else
        {
            Storage::disk('public')->delete($mobil->foto);

            Mobil::where('id_mobil',$mobil->id_mobil)->delete();

            return redirect()->route('mobil.index')->with('success',"Sukses Menghapus Mobil");;
        }
    }
}
