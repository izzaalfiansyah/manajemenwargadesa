<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Controller;
use App\Http\Middleware as MiddleWare;
use Illuminate\Support\Facades\Session;

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
Route::get('/', fn () => redirect(url('/login')));
Route::get('/login', fn () => view('login'))->middleware(MiddleWare\CheckSession::class);
Route::post('/login', [Controller\UserController::class, 'login']);
Route::get('/logout', function () {
    Session::flush();
    return redirect(url('/login'));
});

Route::middleware(MiddleWare\IsLogin::class)->group(function () {
    Route::get('/dashboard', fn () => view('admin.index'));
    Route::get('/profil', [Controller\UserController::class, 'show']);
    Route::put('/user/{id}/auth', [Controller\UserController::class, 'authUpdate']);
    Route::resource('/user', Controller\UserController::class);
    Route::resource('/mutasi', Controller\MutasiController::class);
    Route::resource('/warga', Controller\WargaController::class);
    Route::resource('/keluarga', Controller\KeluargaController::class);
    Route::resource('/inventaris', Controller\InventarisController::class);
    Route::resource('/pengurus', Controller\PengurusController::class);
});