@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Transkrip Nilai Mahasiswa</h4>
        </div>
        <div class="card-body">
            <h5><strong>Nama Mahasiswa:</strong> {{ $mahasiswa->nama }}</h5>
            <h5><strong>NPM:</strong> {{ $mahasiswa->nim }}</h5>
            <hr>
            <table class="table table-bordered mt-3">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Kode MK</th>
                        <th>Nama Matakuliah</th>
                        <th>SKS</th>
                        <th>Nilai Angka</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswa->nilai as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->matakuliah->kode }}</td>
                            <td>{{ $item->matakuliah->nama }}</td>
                            <td>{{ $item->matakuliah->sks }}</td>
                            <td><strong>{{ $item->nilai }}</strong></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data nilai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <a href="{{ url('/mahasiswa') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
