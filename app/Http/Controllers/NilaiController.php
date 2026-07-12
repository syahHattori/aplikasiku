<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Mahasiswa;

class NilaiController extends Controller {
    public function index() {
        $dataNilai = Nilai::with(['mahasiswa', 'matakuliah'])->get();
        return view('datanilai', compact('dataNilai'));
    }

    // Fungsi untuk Tugas 1 & 2
    public function showNilaiMahasiswa($mahasiswaId) {
        $mahasiswa = Mahasiswa::find($mahasiswaId);
        if (!$mahasiswa) {
            return "Data mahasiswa tidak ditemukan";
        }
        return view('nilaimahasiswa', compact('mahasiswa'));
    }
}
