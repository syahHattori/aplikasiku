<?php

use Illuminate\Support\Facades\Route;
// Panggil Controller yang baru dibuat
use App\Http\Controllers\GreetingsController;

// Tugas 1 & 4: Rute dasar ke metode welcome()
Route::get('/', [GreetingsController::class, 'welcome']);

// Tugas 2 & 4: Rute dengan dua parameter ke metode greet()
Route::get('/halo/{name}/{npm}', [GreetingsController::class, 'greet']);