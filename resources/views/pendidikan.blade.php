@extends('layouts.app')
@section('title', 'Halaman Pendidikan')
@section('content')
    <h1>Riwayat Pendidikan</h1>
    <p><span class="label">Perguruan Tinggi</span> : {{ $kampus }}</p>
    <p><span class="label">Program Studi</span> : {{ $prodi }}</p>
@endsection
