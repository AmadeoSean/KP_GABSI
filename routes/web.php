<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\AtletController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KejuaraanController;
use App\Http\Controllers\JadwalLatihanController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\PrestasiController;
use App\Models\Atlet;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/login',[AuthController::class,'login'])->name('login')->middleware('guest');
// Route::post('/login',[AuthController::class,'authenticating'])->middleware('guest');

// Route::get('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');

// Route::get('/register',[AuthController::class,'register'])->name('register');
// Route::post('/register',[AuthController::class,'register_user']);
// Route::get('/reset_password', [AuthController::class, 'resetPassword'])->name('reset-password');
// Route::get('/reset_password', [AuthController::class, 'resetPassword'])->name('forgot-password');
// Route::get('/reset_password', [AuthController::class, 'password_update'])->name('password-update');
//admin
Route::resource('/', AdminController::class)->middleware(['auth','role']);

 
 
Route::get('/pelatih', [PelatihController::class, 'index'])->name('pelatih')->middleware('auth');

Route::get('/pelatih/daftar_atlet', [PelatihController::class, 'listAtlet'])->name('pelatih-daftar_atlet')->middleware('auth');

Route::get('/pelatih/daftar_atlet/create', [AtletController::class, 'create'])->name('atlet_create')->middleware('auth');
Route::post('/pelatih/daftar_atlet/store', [AtletController::class, 'store'])->name('atlet_store')->middleware('auth');

Route::get('/pelatih/daftar_kejuaraan', [KejuaraanController::class, 'listKejuaraan'])->name('pelatih-daftar_kejuaraan')->middleware('auth');

Route::get('/pelatih/profile', [PelatihController::class, 'profile'])->name('pelatih-profile')->middleware('auth');
Route::post('/pelatih/profile/update/{id}', [PelatihController::class, 'update'])->name('pelatih_update')->middleware('auth');

Route::get('/pelatih/latihan/create', [JadwalLatihanController::class, 'create'])->name('latihan_create')->middleware('auth');
Route::POST('/pelatih/latihan/store', [JadwalLatihanController::class, 'store'])->name('latihan_store')->middleware('auth');
Route::get('/pelatih/latihan/detail_latihan/{id}', [JadwalLatihanController::class, 'detailLatihan'])->name('pelatih-detail_latihan')->middleware('auth');
Route::POST('/pelatih/latihan/detail_latihan/{id}/tambahCatatanPelatih', [LatihanController::class, 'tambahCatatanPelatih'])->name('pelatih-detail_latihan_tambah_catatan')->middleware('auth');
Route::POST('/pelatih/latihan/detail_latihan/{id}/getEditCatatanForm', [LatihanController::class, 'getEditCatatanPelatih'])->name('pelatih-detail_latihan_get_editCatatanModal')->middleware('auth');
Route::POST('/pelatih/latihan/detail_latihan/{jadwal_latihan_id}/EditCatatanPelatih/{catatan_id}', [LatihanController::class, 'EditCatatanPelatih'])->name('pelatih-detail_latihan_editCatatanModal')->middleware('auth');

//atlet

Route::get('/atlet', [AtletController::class, 'index'])->name('atlet')->middleware('auth');
Route::get('/atlet/daftar_atlet', [AtletController::class, 'listAtlet'])->name('atlet-daftar_atlet')->middleware('auth');
// Route::get('/atlet/data_pribadi', [AtletController::class, 'dataPribadi'])->name('atlet-data_pribadi')->middleware('auth');
Route::get('/atlet/daftar_kejuaraan', [KejuaraanController::class, 'listKejuaraan'])->name('atlet-daftar_kejuaraan')->middleware('auth');

Route::get('/atlet/daftar_prestasi', [AtletController::class, 'listPrestasi'])->name('atlet-daftar_prestasi')->middleware('auth');
Route::get('/atlet/daftar_prestasi/create', [PrestasiController::class, 'create'])->name('prestasi_create')->middleware('auth');
Route::post('/atlet/daftar_prestasi/store', [PrestasiController::class, 'store'])->name('prestasi_store')->middleware('auth');
Route::get('/atlet/daftar_prestasi/detail/{id}', [PrestasiController::class, 'edit'])->name('prestasi_edit')->middleware('auth');
Route::post('/atlet/daftar_prestasi/detail/{id}', [PrestasiController::class, 'update'])->name('prestasi_update')->middleware('auth');

Route::get('/atlet/profile', [AtletController::class, 'profile'])->name('atlet-profile')->middleware('auth');
Route::post('/atlet/profile/update/{id}', [AtletController::class, 'update'])->name('atlet_update')->middleware('auth');

Route::get('/atlet/latihan/detail_latihan/{id}', [JadwalLatihanController::class, 'detailLatihanAtlet'])->name('atlet-detail_latihan')->middleware('auth');
Route::POST('/atlet/latihan/detail_latihan/{id}/tambahCatatanDiri', [LatihanController::class, 'tambahCatatanDiri'])->name('atlet-detail_latihan_tambah_catatan_diri')->middleware('auth');

Route::POST('/atlet/latihan/detail_latihan/{id}/tambahCatatanPartner', [LatihanController::class, 'tambahCatatanPartner'])->name('atlet-detail_latihan_tambah_catatan_partner')->middleware('auth');
Route::POST('/atlet/latihan/detail_latihan/{id}/tambahCatatanDiriPartner', [LatihanController::class, 'tambahCatatanDiriPartner'])->name('atlet-detail_latihan_tambah_catatan_diri_partner')->middleware('auth');

Route::POST('/atlet/latihan/detail_latihan/{id}/getEditCatatanPartnerForm', [LatihanController::class, 'getEditCatatanPartner'])->name('atlet-detail_latihan_get_editCatatanPartnerModal')->middleware('auth');
Route::POST('/atlet/latihan/detail_latihan/{jadwal_latihan_id}/EditCatatanPartner/{catatan_id}', [LatihanController::class, 'EditCatatanPartner'])->name('atlet-detail_latihan_editCatatanPartnerModal')->middleware('auth');

Route::POST('/atlet/latihan/detail_latihan/{id}/getEditCatatanDiriForm', [LatihanController::class, 'getEditCatatanDiri'])->name('atlet-detail_latihan_get_editCatatanDiriModal')->middleware('auth');
Route::POST('/atlet/latihan/detail_latihan/{jadwal_latihan_id}/EditCatatanDiri/{catatan_id}', [LatihanController::class, 'EditCatatanDiri'])->name('atlet-detail_latihan_editCatatanDiriModal')->middleware('auth');


Route::get('/atlet/daftar_kejuaraan/catatan_kejuaraan', [AtletController::class, 'catatanKejuaraan'])->name('atlet-catatan_kejuaraan')->middleware('auth');


// Route::resource('atlet', AtletController::class)->middleware('auth');




// Route::resource('prestasi', PrestasiController::class)->middleware('auth');
// Route::resource('latihan', LatihanController::class)->middleware('auth');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
