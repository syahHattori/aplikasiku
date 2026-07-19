<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreetingsController extends Controller
{
    // Metode untuk menangani rute dasar
    public function welcome()
    {
        return 'Selamat datang di aplikasi Laravel!';
    }

    // Metode untuk menangani rute dengan dua parameter (Nama dan NPM)
    public function greet($name, $npm)
    {
        // Langsung mengembalikan teks nama Ester Jesika Sihombing secara statis
        return 'Halo, ester jesika sihombing 238160012!';
    }
}