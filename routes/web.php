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
    return view('welcome');
});

Route::resource('/notaris', \App\Http\Controllers\enotariscontroller::class);
Route::resource('/dokumen', \App\Http\Controllers\dokumencontroller::class);


Route::middleware('auth')->post('logout', [AuthController::class, 'logout']);

Route::get('login', [AuthController::class, 'showlogin'])->name('login');
Route::get('register', [AuthController::class, 'showregister'])->name('register');

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
