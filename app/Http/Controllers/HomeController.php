<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Pelatih;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlah_mobil=Mobil::count();
        $jumlah_peserta=Peserta::count();
        $jumlah_pelatih=Pelatih::count();

        return view('admin.home.home',[
            'mobil'=>$jumlah_mobil,
            'peserta'=>$jumlah_peserta,
            'pelatih'=>$jumlah_pelatih
        ]);
    }
}
