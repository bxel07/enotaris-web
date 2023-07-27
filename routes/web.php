<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('landing/index');
});

Route::get('/tracking', function () {
    return view('landing/tracking');
});

Route::get('/tracking-after', function () {
    return view('landing/tracking-after');
});

Route::resource('/notaris', \App\Http\Controllers\enotariscontroller::class);
Route::resource('/dokumen', \App\Http\Controllers\dokumencontroller::class);


Route::resource('/pengajuan' , \App\Http\Controllers\pengajuancontroller::class);
Route::get('/pengajuan/editdokumen/{id}', [\App\Http\Controllers\pengajuancontroller::class, 'editdokumen'])->name('pengajuan.editdokumen');
Route::put('/pengajuan/updatedokumen/{id}', [\App\Http\Controllers\pengajuancontroller::class, 'updatedokumen'])->name('pengajuan.updatedokumen');

