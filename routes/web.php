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

// ROUTE MODUL 7
Route::get('login-custom', [App\Http\Controllers\UserController::class, 'showLoginForm'])->name('login-custom');
Route::post('login-custom', [App\Http\Controllers\UserController::class, 'login'])->name('login-custom.post');
Route::get('logout-custom', [App\Http\Controllers\UserController::class, 'logout'])->name('logout-custom');

Route::middleware(['auth'])->group(function () {
    Route::get('home-custom', [App\Http\Controllers\UserController::class, 'showHome'])->name('home-custom');
    
    Route::middleware(['role:admin'])->group(function () {
        Route::get('admin', [App\Http\Controllers\UserController::class, 'showAdmin'])->name('admin');
    });
    
    Route::middleware(['role:owner'])->group(function () {
        Route::get('owner', [App\Http\Controllers\UserController::class, 'showOwner'])->name('owner');
    });
    
    // Route Tugas (Hanya bisa diakses jika usia minimal 18)
    Route::middleware(['usia:18'])->group(function () {
        Route::get('dewasa', [App\Http\Controllers\UserController::class, 'showDewasa'])->name('dewasa');
    });
});

// ROUTE MODUL 8
Route::get('/upload', [App\Http\Controllers\FileUploadController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload', [App\Http\Controllers\FileUploadController::class, 'storeFile'])->name('upload.store');
Route::get('/files', [App\Http\Controllers\FileUploadController::class, 'listFiles'])->name('files.list');
Route::delete('/files/{filename}', [App\Http\Controllers\FileUploadController::class, 'deleteFile'])->name('files.delete');

// ROUTE MODUL 9 (SCAN QR)
Route::get('/scankode', [App\Http\Controllers\ScanController::class, 'scanKode']);
Route::post('/scan', [App\Http\Controllers\ScanController::class, 'processScan']);
Route::get('/scan-data-produk', function() { return view('scandataproduk'); });
Route::post('/scan-produk', [App\Http\Controllers\ScanController::class, 'processScanProduk']);
Route::get('/generate-qr/{sku}', [App\Http\Controllers\ScanController::class, 'generateQr']); // Tugas 4
