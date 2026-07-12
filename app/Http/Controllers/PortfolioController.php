<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function profil()
    {
        return view('profil', [
            'nama' => 'Meukeuta Perkasa Syah Muhammad',
            'npm' => '238160008'
        ]);
    }

    public function pendidikan()
    {
        return view('pendidikan', [
            'kampus' => 'Universitas Medan Area',
            'prodi' => 'Teknik Informatika'
        ]);
    }

    public function keahlian()
    {
        return view('keahlian', [
            'skill' => 'Laravel Framework, PHP, MySQL, HTML/CSS, Git'
        ]);
    }
}
