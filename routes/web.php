<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\AtletController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KejuaraanController;

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

Route::get('/login',[AuthController::class,'login'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class,'authenticating'])->middleware('guest');

Route::get('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');

Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'register_user']);

//admin
// Route::get('/', [AdminController::class, 'dashboardAdmin'])->name('dashboardAdmin')->middleware(['auth', 'role']);
Route::resource('/', PelatihController::class)->middleware(['auth', 'role']);
//pelatih
 
// Route::get('/pelatih/halaman_utama')->middleware('auth')->name('pelatih');

// Route::get('/pelatih/daftar_kejuaraan', function(){
//     return view('pelatih/daftar_kejuaraan');
// });
 
 

Route::get('/pelatih/daftar_atlet', [AtletController::class, 'listAtlet'])->name('pelatih-daftar_atlet')->middleware('auth');
Route::get('/pelatih/daftar_kejuaraan', [KejuaraanController::class, 'listKejuaraan'])->name('pelatih-daftar_kejuaraan')->middleware('auth');

Route::get('/pelatih/profile', [PelatihController::class, 'profile'])->name('pelatih-profile')->middleware('auth');
// Route::post('/pelatih/profile', [PelatihController::class, 'updateProfile'])->name('pelatih-profile')->middleware('auth');
Route::resource('pelatih', PelatihController::class)->middleware('auth');
 


//atlet

 
Route::get('/atlet/daftar_atlet', [AtletController::class, 'listAtlet'])->name('atlet-daftar_atlet')->middleware('auth');
// Route::get('/atlet/data_pribadi', [AtletController::class, 'dataPribadi'])->name('atlet-data_pribadi')->middleware('auth');
Route::get('/atlet/daftar_kejuaraan', [KejuaraanController::class, 'listKejuaraan'])->name('atlet-daftar_kejuaraan')->middleware('auth');

Route::get('/atlet/profile', [AtletController::class, 'profile'])->name('atlet-profile')->middleware('auth');
// Route::get('/atlet/profile', function(){
//     return view('dataTable');
// })->name('dataTable');
// Route::post('/atlet/profile', [AtletController::class, 'updateProfile'])->name('atlet-profile')->middleware('auth');
Route::resource('atlet', AtletController::class)->middleware('auth');

// Route::resource('category', CategoryController::class);
// Route::resource('transaction', TransactionController::class);