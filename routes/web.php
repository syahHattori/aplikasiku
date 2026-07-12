<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () { return view('welcome'); });
Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');
Route::resource('mahasiswa', MahasiswaController::class);

// Route untuk Tugas Modul 5
Route::get('/nilai/{mahasiswaId}', [NilaiController::class, 'showNilaiMahasiswa'])->name('tampilnilai');
