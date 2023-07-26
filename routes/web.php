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

//  jika user belum login
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/', [\App\Http\Controllers\AuthController::class, 'dologin']);
    Route::get('forget-password', [\App\Http\Controllers\AuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [\App\Http\Controllers\AuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [\App\Http\Controllers\AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [\App\Http\Controllers\AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');


});

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2']], function() {
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('/redirect', [\App\Http\Controllers\RedircetController::class, 'cek']);
});


// untuk superadmin
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/superadmin', [\App\Http\Controllers\SuperadminController::class, 'index']);
});

// untuk pegawai
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/pegawai', [\App\Http\Controllers\PegawaiController::class, 'index']);

});
