<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\PesertaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/report',[ReportController::class,'index'])->name('reportIndex');
Route::post('/reportmobil',[ReportController::class,'reportMobil'])->name('reportMobil');
Route::post('/reportpelatih',[ReportController::class,'reportPelatih'])->name('reportPelatih');
Route::post('/reportpeserta',[ReportController::class,'reportPeserta'])->name('reportPeserta');
Route::post('/reportpaket',[ReportController::class,'reportPaket'])->name('reportPaket');
Route::post('/reportkursus',[ReportController::class,'reportKursus'])->name('reportKursus');


Route::get('/reporttest',[ReportController::class,'reportTest'])->name('reportTest');

Route::get('/tambahkursus/{peserta}',[KursusController::class,'tambahKursus'])->name('tambahKursus');

Route::post('logout',[LogoutController::class,'logout'])->name('logout');


Route::resources([
    'mobil'=>MobilController::class,
    'peserta'=>PesertaController::class,
    'pelatih'=>PelatihController::class,
    'kursus'=>KursusController::class,
    'paket'=>PaketController::class,
]);
