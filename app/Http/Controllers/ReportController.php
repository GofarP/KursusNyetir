<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Mobil;
use App\Models\Paket;
use App\Models\Kursus;
use App\Models\Pelatih;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.report.index');
    }

    public function reportMobil(Request $request)
    {

        $jenis_laporan=$request->jenislaporanmobil;
        $kriteria_mobil=$request->kriteria_mobil;
        $mobil=null;

        if($jenis_laporan=="Semua")
        {
            $mobil=Mobil::all();
        }

        else if($jenis_laporan=="Nama")
        {
            if($kriteria_mobil=="")
            {
                return back()->with('error',"Silahkan Isi Nama Mobil Yang Ingin Dicari");
            }

            else
            {
                $mobil=Mobil::where('nama','=',$kriteria_mobil)->first();

                if(!$mobil)
                {
                    return back()->with('error','Mobil Dengan Nama Tersebut Tidak Ditemukan');
                }
            }
        }

        else if($jenis_laporan=="Id")
        {
            if($kriteria_mobil=="")
            {
                return back()->with('error',"Silahkan Isi Id Mobil Yang Ingin Dicari");
            }

            else
            {
                $mobil=Mobil::where('id_mobil','=',$kriteria_mobil)->first();
                if(!$mobil)
                {
                    return back()->with('error','Mobil Dengan Id Tersebut Tidak Ditemukan');
                }
            }
        }

        else
        {
            return back()->with('error',"Jenis Laporan Tidak Diketahui");
        }

        $pdf = PDF::loadview('admin.report.laporan-mobil',['mobil'=>$mobil]);
        return $pdf->setPaper('A4')->stream('laporan-mobil.pdf');


    }



    public function reportPelatih(Request $request)
    {
        $jenis_laporan=$request->jenislaporanpelatih;
        $kriteria_pelatih=$request->kriteria_pelatih;
        $pelatih=null;

        if($jenis_laporan=="Semua")
        {
            $pelatih=Pelatih::all();
        }

        else if($jenis_laporan=="Nama")
        {
            if($kriteria_pelatih=="")
            {
                return back()->with('error',"Silahkan Isi Nama Pelatih Yang Ingin Dicari");
            }

            else
            {
                $pelatih=Pelatih::where('nama','=',$kriteria_pelatih)->first();

                if(!$pelatih)
                {
                    return back()->with('error',"Pelatih Dengan Nama Tersebut Tidak Ditemukan");
                }
            }
        }

        else if($jenis_laporan=="Id")
        {
            if($kriteria_pelatih=="")
            {
                return back()->with('error',"Silahkan Isi Id Pelatih Yang Ingin Dicari");
            }

            else
            {
                $pelatih=Pelatih::where('id_pelatih','=',$kriteria_pelatih)->first();
                if(!$pelatih)
                {
                    return back()->with('error',"Pelatih Dengan Id Tersebut Tidak Ditemukan");
                }
            }
        }

        else
        {
            return back()->with('error',"Jenis Laporan Tidak Diketahui");
        }

        $pdf = PDF::loadview('admin.report.laporan-pelatih',['pelatih'=>$pelatih]);
        return $pdf->setPaper('A4')->stream('laporan-pelatih.pdf');

    }

    public function reportPeserta(Request $request)
    {
        $jenis_laporan=$request->jenislaporanpeserta;
        $kriteria_peserta=$request->kriteria_peserta;
        $peserta=null;

        if($jenis_laporan=="Semua")
        {
            $peserta=Peserta::all();
        }

        else if($jenis_laporan=="Nama")
        {
            if($kriteria_peserta=="")
            {
                return back()->with('error',"Silahkan Isi Nama Peserta Yang Ingin Dicari");
            }

            else
            {
                $peserta=Peserta::where('nama','=',$kriteria_peserta)->first();
                if(!$peserta)
                {
                    return back()->with('error',"Peserta Dengan Nama Tersebut Tidak Ditemukan");
                }
            }
        }

        else if($jenis_laporan=="Id")
        {
            if($kriteria_peserta=="")
            {
                return back()->with('error',"Silahkan Isi Id Peserta Yang Ingin Dicari");
            }

            else
            {
                $peserta=Peserta::where('id_peserta','=',$kriteria_peserta)->first();
                if(!$peserta)
                {
                    return back()->with('error',"Peserta Dengan Id Tersebut Tidak Ditemukan");
                }
            }
        }

        else
        {
            return back()->with('error',"Jenis Laporan Tidak Diketahui");
        }

        $pdf = PDF::loadview('admin.report.laporan-peserta',['peserta'=>$peserta]);
        return $pdf->setPaper('A4')->stream('laporan-peserta.pdf');

    }


    public function reportPaket(Request $request)
    {
        $jenis_laporan=$request->jenislaporanpaket;
        $kriteria_paket=$request->kriteria_paket;
        $paket=null;

        if($jenis_laporan=="Semua")
        {
            $paket=Paket::all();
        }

        else if($jenis_laporan=="Nama")
        {
            if($kriteria_paket=="")
            {
                return back()->with('error',"Silahkan Isi Nama Paket Yang Ingin Dicari");
            }

            else
            {
                $paket=Peserta::where('nama','=',$kriteria_paket)->first();

                if(!$paket)
                {
                    return back()->with('error',"Paket Dengan Nama Tersebut Tidak Ditemukan");
                }
            }
        }

        else if($jenis_laporan=="Id")
        {
            if($kriteria_paket=="")
            {
                return back()->with('error',"Silahkan Isi Id Peserta Yang Ingin Dicari");
            }

            else
            {
                $paket=Peserta::where('id_paket','=',$kriteria_paket)->first();
                if(!$paket)
                {
                    return back()->with('error',"Paket Dengan ID Tersebut Tidak Ditemukan");
                }
            }
        }

        else
        {
            return back()->with('error',"Jenis Laporan Tidak Diketahui");
        }

        $pdf = PDF::loadview('admin.report.laporan-paket',['paket'=>$paket]);
        return $pdf->setPaper('A4')->stream('laporan-peserta.pdf');

    }


    public function reportKursus(Request $request)
    {
        $jenis_laporan=$request->jenislaporanpaket;
        $kriteria_kursus=$request->kriteria_paket;

        $kursus=Kursus::select("kursus.id_kursus","kursus.mulai_tanggal", "kursus.selesai_tanggal", "kursus.status", "kursus.total",
        "pelatih.nama AS nama_pelatih", "mobil.nama AS nama_mobil", "mobil.jenis AS jenis_mobil","peserta.nama AS nama_peserta",
        "paket.nama AS nama_paket")
        ->with(['mobil','pelatih','peserta','paket'])
        ->join('mobil','mobil.id_mobil','=','kursus.id_mobil')
        ->join('pelatih','pelatih.id_pelatih','=','kursus.id_pelatih')
        ->join('peserta','peserta.id_peserta','=','kursus.id_peserta')
        ->join('paket','paket.id_paket','=','kursus.id_paket');

        if($jenis_laporan=="Semua")
        {
            $kursus->get();
        }

        else if($jenis_laporan=="Mobil")
        {
            if($kriteria_kursus=="")
            {
                return back()->with('error',"Silahkan Masukkan Kriteria Mobil Yang Mau Dicari");
            }

            else
            {
                $kursus->where('nama_mobil','=',$kriteria_kursus);
                if(!$kursus)
                {
                    return back()->with('error','Kursus Dengan Nama Mobil Tersebut Tidak Ditemukan');
                }
            }
        }

        else if($jenis_laporan=="Paket")
        {
            if($kriteria_kursus="")
            {
                return back()->with('error',"Silahkan Masukkan Kriteria Paket Yang Mau Dicari");
            }

            else
            {
                $kursus->where('nama_paket','=',$kriteria_kursus);
                if(!$kursus)
                {
                    return back()->with('error','Kursus Dengan Nama Paket Tersebut Tidak Ditemukan');
                }
            }
        }


        else if($jenis_laporan=="Pelatih")
        {
            if($kriteria_kursus="")
            {
                return back()->with('error',"Silahkan Masukkan Kriteria Pelatih Yang Mau Dicari");
            }

            else
            {
                $kursus->where('nama_pelatih','=',$kriteria_kursus);
                if(!$kursus)
                {
                    return back()->with('error','Kursus Dengan Nama Pelatih Tersebut Tidak Ditemukan');
                }
            }
        }

        else if($jenis_laporan=="Peserta")
        {
            if($kriteria_kursus="")
            {
                return back()->with('error',"Silahkan Masukkan Kriteria Peserta Yang Mau Dicari");
            }

            else
            {
                $kursus->where('nama_peserta','=',$kriteria_kursus);
                if(!$kursus)
                {
                    return back()->with('error','Kursus Dengan Nama Peserta Tersebut Tidak Ditemukan');
                }
            }
        }


        else if($jenis_laporan=="Id")
        {
            if($kriteria_kursus="")
            {
                return back()->with('error',"Silahkan Masukkan ID Kursus Yang Mau Dicari");
            }

            else
            {
                $kursus->where('id_kursus','=',$kriteria_kursus);
                if(!$kursus)
                {
                    return back()->with('error','Kursus Dengan Id Kursus Tersebut Tidak Ditemukan');
                }
            }
        }


        else
        {
            return back()->with('error',"Format Laporan Tidak Diketahui");
        }

        $pdf=PDF::loadview('admin.report.laporan-kursus',['pelatih'=>$kursus]);
        return $pdf->setPaper('A4')->stream('laporan-semua-pelatih');
    }





}
?>
