<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PresensiController;
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

Route::get('/login',[LoginController::class, 'halamanLogin'])->name('login');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
Route::post('/postlogin',[LoginController::class, 'postLogin'])->name('postlogin');

Route::group(['middleware' => ['auth','ceklevel:admin,karyawan']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::group(['middleware' => ['auth','ceklevel:karyawan']], function () {
    route::post('/home',[PresensiController::class,'index'])->name('home-karyawan');
   
});