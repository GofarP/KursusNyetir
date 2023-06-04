<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaketRequest;
use App\Models\Paket;
use App\Models\Kursus;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.paket.index',['paket'=>Paket::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaketRequest $request)
    {
        $data_paket=$request->all();

        Paket::create($data_paket);

        return  redirect()->route('paket.index')->with('success',"Sukses Menambahkan Paket Baru");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $paket)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit(Paket $paket)
    {
        return view('admin.paket.edit',['paket'=>$paket]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(PaketRequest $request, Paket $paket)
    {
        $data_paket=$request->except(['_token','_method']);

        Paket::where('id_paket','=',$paket->id_paket)->update($data_paket);

        return  redirect()->route('paket.index')->with('success',"Sukses Mengubah Data Paket");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paket $paket)
    {
        $cek_paket=Kursus::where(['id_paket','=',$paket->id_paket])->first();

        if($cek_paket)
        {
            return back()->with('error',"Tidak Dapat Menghapus Pelatih Ini Dikarenakan Sedang Digunakan Untuk Kursus");
        }

        else
        {
            Paket::where(['id_paket','=',$paket->id_paket])->delete();

            return redirect()->route('paket.index')->with('success',"Sukses Menghapus Paket");
        }
    }
}
