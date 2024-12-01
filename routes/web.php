<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RekeningController;
use App\Http\Controllers\Admin\KategoriRetribusiController;
use App\Http\Controllers\Admin\WajibRetribusiController;
use App\Http\Controllers\Admin\KapalController;
use App\Http\Controllers\Retribusi\KapalkuController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\Retribusi\KonfirmasiPembayaranController;
use App\Http\Controllers\Retribusi\RetribusiController;
use App\Http\Controllers\Retribusi\ProfilController;
use App\Http\Controllers\SuperAdmin\SuperadminController;
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

Route::get('/', function () {
    return view('auth.Login-aplikasi');
});

Route::get('/login',[AppController::class, 'halamanLogin'])->name('login');
Route::get('/logout',[AppController::class, 'logout'])->name('logout');
Route::post('/postlogin',[AppController::class, 'postLogin'])->name('postlogin');

Route::group(['middleware' => ['auth','ceklevel:admin']], function () {
    Route::get('/home', [AdminController::class, 'index'])->name('home');
    Route::resource('rekening', RekeningController::class);
    Route::resource('kategori-retribusi', KategoriRetribusiController::class);
    
    Route::resource('kapal', KapalController::class);
    Route::resource('pembayaran', PembayaranController::class);


});

Route::group(['middleware' => ['auth','ceklevel:retribusi']], function () {
    Route::resource('profil', ProfilController::class);
    Route::resource('kapalku', KapalkuController::class);
    

});


Route::group(['middleware' => ['auth','ceklevel:admin,retribusi']], function () {
    Route::get('/change-password', [AppController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [AppController::class, 'updatePassword'])->name('password.ganti');
    route::get('/kategori-retribusi',[KategoriRetribusiController::class,'index'])->name('kategori-retribusi.index');
    Route::resource('wajib-retribusi', WajibRetribusiController::class);
    Route::resource('konfirmasi-pembayaran', KonfirmasiPembayaranController::class);
    Route::resource('pembayaran', PembayaranController::class);
    Route::get('/kapal', [KapalController::class,'index'])->name('kapal.index');

});

Route::middleware(['auth', 'ceklevel:superadmin'])->group(function () {
    Route::resource('kelola-user', SuperadminController::class);
});

Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/export/pdf', [LaporanController::class, 'exportPdf'])->name('laporan.export.pdf');
Route::get('/laporan/export/docx', [LaporanController::class, 'exportDocx'])->name('laporan.export.docx');

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
        ? back()->with(['status' => __('Kami telah mengirimkan tautan untuk mereset kata sandi Anda')])
        : back()->withErrors(['email' => __('Gagal mengirim tautan reset kata sandi')]);

})->middleware('guest')->name('password.email');



Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => [
            'required',
            'string',
            'min:8',
            'regex:/[a-z]/',
            'regex:/[A-Z]/',
            'regex:/[0-9]/',
            'regex:/[@$!%*?&#]/',
            'confirmed',
        ],
    ], [
        'token.required' => 'Token wajib diisi.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password harus memiliki minimal 8 karakter.',
        'password.regex' => 'Password harus mengandung setidaknya satu huruf besar, satu huruf kecil, satu angka, dan satu karakter spesial (@$!%*?&#).',
        'password.confirmed' => 'Konfirmasi password tidak cocok.',
    ]);
    
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

