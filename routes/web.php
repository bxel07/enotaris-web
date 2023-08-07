<?php

use App\Http\Controllers\SuperadminController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resource('/notaris', \App\Http\Controllers\enotariscontroller::class);
Route::resource('/dokumen', \App\Http\Controllers\dokumencontroller::class);
//Route::resource('/pengajuan' , \App\Http\Controllers\pengajuancontroller::class);

//  jika user belum login
Route::group(['middleware' => 'guest'], function() {

    // Landing & tracking data

    Route::get('/' ,[\App\Http\Controllers\landing::class, 'index']);
    Route::get('/tracking' ,[\App\Http\Controllers\landing::class, 'tracking']);
    Route::match(['get', 'post'], '/dotracking', [\App\Http\Controllers\landing::class, 'dotracking'])->name('dotracking');

    // auth controller
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'dologin']);
    Route::get('forget-password', [\App\Http\Controllers\AuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [\App\Http\Controllers\AuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [\App\Http\Controllers\AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [\App\Http\Controllers\AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');
});

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2']], function() {
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::get('/redirect', [\App\Http\Controllers\RedircetController::class, 'cek']);
    Route::resource('/pengajuan' , \App\Http\Controllers\pengajuancontroller::class);
    Route::get('/pengajuan', [\App\Http\Controllers\pengajuancontroller::class, 'index'])->name('pengajuan.index');
    Route::resource('/pengajuan_data', \App\Http\Controllers\pengajuan\proses_pengajuan::class);
});

// untuk superadmin
Route::group(['middleware' => ['auth', 'checkrole:1'], 'prefix' => 'superadmin'], function() {
    //dashboard
    Route::get('/dashboard', [App\Http\Controllers\user\SuperAdmin::class, 'index'])->name('notaris.index');
    //generate router
    Route::get('/generate', [App\Http\Controllers\user\SuperAdmin::class, 'generate'])->name('notaris.generate');
    Route::get('/preview/{id}',[App\Http\Controllers\user\SuperAdmin::class, 'preview'])->name('notaris.preview');

    Route::get('/log', [SuperadminController::class, 'log'])->name('notaris.log');
    Route::get('/file', [SuperadminController::class, 'files'])->name('notaris.files');
});


// untuk pegawai
Route::group(['middleware' => ['auth', 'checkrole:2'],'prefix' => 'pegawai'], function() {
    Route::match(['get', 'post'], '/dashboard', [\App\Http\Controllers\PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/generate', [\App\Http\Controllers\PegawaiController::class, 'generateshow'])->name('pegawai.generateshow');
    Route::get('/log', [\App\Http\Controllers\PegawaiController::class, 'log'])->name('pegawai.log');
    Route::get('/file', [\App\Http\Controllers\PegawaiController::class, 'files'])->name('pegawai.file');
});
