<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('layout/app');
// });

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/postlogin ',[AuthController::class,'postlogin']);
Route::get('/logout ',[AuthController::class,'logout']);
Route::get('/login ',[AuthController::class,'login'])->name('login');



Route::resource('/buku',BukuController::class);




Route::get('/penerbit ',[PenerbitController::class,'index']);
Route::get('/penerbit/{id}/edit ',[PenerbitController::class,'edit']);
Route::put('/penerbit/{id} ',[PenerbitController::class,'update']);
Route::post('/penerbit/store',[PenerbitController::class,'store']);
Route::get('/penerbit/{id} ',[PenerbitController::class,'destroy']);

// Route::get('/anggota ',[AnggotaController::class,'index']);
// Route::get('/anggota/{id}/edit ',[AnggotaController::class,'edit']);
// Route::put('/anggota/{id} ',[AnggotaController::class,'update']);
// Route::post('/anggota/store',[AnggotaController::class,'store']);
// Route::get('/anggota/{id} ',[AnggotaController::class,'destroy']);


Route::resource('/anggota',AnggotaController::class);
// Route::get('/anggota/{id}', [AnggotaController::class, 'destroy']);
// Route::get('/anggotat/{id}/edit ',[AnggotatController::class,'edit']);
// Route::put('/anggotat/{id} ',[AnggotatController::class,'update']);
// Route::post('/anggotat/store',[AnggotatController::class,'store']);

Route::group(['middleware'=> 'auth'], function(){
    Route::get('/dashboard ',[DashboardController::class,'index']);

    Route::get('/kategori ',[KategoriController::class,'index']);
    Route::get('/kategori/{id}/edit ',[KategoriController::class,'edit']);
    Route::put('/kategori/{id} ',[KategoriController::class,'update']);
    Route::post('/kategori/store',[KategoriController::class,'store']);
    Route::get('/kategori/{id} ',[KategoriController::class,'destroy']);

});



