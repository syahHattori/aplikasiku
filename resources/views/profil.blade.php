@extends('layouts.app')
@section('title', 'Halaman Profil')
@section('content')
    <h1>Profil Mahasiswa</h1>
    <p><span class="label">Nama Lengkap</span> : {{ $nama }}</p>
    <p><span class="label">NPM</span> : {{ $npm }}</p>
    <p><span class="label">Fakultas</span> : Teknik</p>
@endsection
