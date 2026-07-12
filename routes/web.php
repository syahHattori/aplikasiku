<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () { return view('welcome'); });
Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');
Route::resource('mahasiswa', MahasiswaController::class);

// Route untuk Tugas Modul 5
Route::get('/nilai/{mahasiswaId}', [NilaiController::class, 'showNilaiMahasiswa'])->name('tampilnilai');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ROUTE PRAKTIKUM 2 (MANUAL AUTH)
Route::get('/login-manual', function () {
    return view('auth_manual.login');
})->name('login.manual');

Route::post('/login-manual', [App\Http\Controllers\AuthController::class, 'cekLogin'])->name('cek-login');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/logout-manual', function () {
        Illuminate\Support\Facades\Auth::logout();
        return redirect()->route('login.manual')->with('success', 'Anda telah logged out.');
    })->name('logout.manual');
});
