<?php

namespace App\Http\Controllers;

use App\Http\Requests\KursusRequest;
use App\Models\Mobil;
use App\Models\Paket;
use App\Models\Kursus;
use App\Models\Pelatih;
use App\Models\Peserta;
use Illuminate\Routing\Controller;

class KursusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_kursus=Kursus::select("kursus.id_kursus","kursus.mulai_tanggal", "kursus.selesai_tanggal", "kursus.status", "kursus.total",
        "pelatih.nama AS nama_pelatih", "mobil.nama AS nama_mobil", "mobil.jenis AS jenis_mobil","peserta.nama AS nama_peserta",
        "paket.nama AS nama_paket")
        ->with(['mobil','pelatih','peserta','paket'])
        ->join('mobil','mobil.id_mobil','=','kursus.id_mobil')
        ->join('pelatih','pelatih.id_pelatih','=','kursus.id_pelatih')
        ->join('peserta','peserta.id_peserta','=','kursus.id_peserta')
        ->join('paket','paket.id_paket','=','kursus.id_paket')
        ->get();

        return view('admin.kursus.index',['peserta'=>Peserta::all()],['data_kursus'=>$data_kursus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KursusRequest $request)
    {
        $data_kursus=$request->all();
        $data_kursus['mulai_tanggal']=date("d-m-Y");

        Kursus::create($data_kursus);

        return redirect()->route('kursus.index')->with('success',"Sukses Menambahkan Data Kursus");

    }

    /**
     * Display the specified resource.
     */
    public function show(Kursus $kursus)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kursus $kursus)
    {
        $data_pelatih=Pelatih::all();
        $data_mobil=Mobil::all();
        $data_paket=Paket::all();
        $data_peserta=Peserta::where('id_peserta',"=",$kursus->id_peserta)->pluck('nama')->first();
        return view('admin.kursus.edit',[
            'peserta'=>$data_peserta,
            'kursus'=>$kursus,
            'paket'=>$data_paket,
            'pelatih'=>$data_pelatih,
            'mobil'=>$data_mobil
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KursusRequest $request, Kursus $kursus)
    {
        $data_kursus=$request->except(['_token','_method']);

        if($data_kursus['status']=="Selesai")
        {
            $data_kursus['selesai_tanggal']=date('d-m-Y');
        }

        else if($data_kursus['status']=="Berjalan")
        {
            $data_kursus['selesai_tanggal']=NULL;
        }

        Kursus::where('id_kursus','=',$kursus->id_kursus)->update($data_kursus);

        return redirect()->route('kursus.index')->with('success',"Sukses Mengubah Data Kursus");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kursus $kursus)
    {

        $cek_status_kursus=Kursus::where([
            ['id_kursus',"=",$kursus->id_kursus],
            ['status',"=",'Berjalan']
        ])->first();

        if($cek_status_kursus)
        {
            return redirect()->route('kursus.index')->with('error',"Gagal Menghapus Data Kursus Karena Kursus Masih Berjalan");
        }

        else
        {
            Kursus::where('id_kursus','=',$kursus->id)->delete();
            return redirect()->route('kursus.index')->with('success',"Sukses Menghapus Data Kursus");
        }
    }


    public function tambahKursus(Peserta $peserta)
    {
        $data_pelatih=Pelatih::all();
        $data_mobil=Mobil::all();
        $data_paket=Paket::all();
        return view('admin.kursus.create',[
            'peserta'=>$peserta,
            'paket'=>$data_paket,
            'pelatih'=>$data_pelatih,
            'mobil'=>$data_mobil
        ]);
    }
}
?>
