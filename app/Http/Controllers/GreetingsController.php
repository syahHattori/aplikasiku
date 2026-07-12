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
        return 'Halo, ' . $name . ' meukeuta perkasa syah muhammad' . $npm . ' 238160008!';
    }
}