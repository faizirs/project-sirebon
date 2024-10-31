<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RekeningController;
use App\Http\Controllers\Admin\KategoriRetribusiController;
use App\Http\Controllers\Admin\WajibRetribusiController;
use App\Http\Controllers\Admin\KapalController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Retribusi\RetribusiController;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
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
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    try {
        $status = Password::sendResetLink($request->only('email'));

    } catch (\Exception $e) {
        return back()->withErrors(['email' => 'Error: ' . $e->getMessage()]);
    }

    return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');



Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::get('/', function () {
    return view('Login.Login-aplikasi');
});

Route::get('/login',[LoginController::class, 'halamanLogin'])->name('login');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
Route::post('/postlogin',[LoginController::class, 'postLogin'])->name('postlogin');

Route::group(['middleware' => ['auth','ceklevel:admin']], function () {
    Route::get('/home', [AdminController::class, 'index'])->name('home');
    Route::resource('rekening', RekeningController::class);
    Route::resource('kategori-retribusi', KategoriRetribusiController::class);
    Route::resource('wajib-retribusi', WajibRetribusiController::class);
    Route::resource('kapal', KapalController::class);
    Route::resource('pembayaran', PembayaranController::class);


});

Route::group(['middleware' => ['auth','ceklevel:retribusi']], function () {
    route::get('/profil',[RetribusiController::class,'profil'])->name('profil');
});