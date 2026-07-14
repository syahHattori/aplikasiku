@extends('layouts.app')
@section('title', 'Data User')
@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white"><h4>Data Pengguna (Client-Side DataTables)</h4></div>
    <div class="card-body">
        <table class="table table-bordered table-striped" id="users-table">
            <thead class="table-dark">
                <tr><th>ID</th><th>Nama</th><th>Email</th><th>Role</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr id="row-{{ $user->id }}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><span class="badge bg-secondary">{{ strtoupper($user->role) }}</span></td>
                    <td>
                        <button class="btn btn-sm btn-danger" onclick="deleteUser({{ $user->id }})">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#users-table').DataTable(); // Inisialisasi DataTables Client-Side
    });

    function deleteUser(id) {
        Swal.fire({
            title: 'Hapus User ini?',
            text: "Data tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/users/" + id,
                    type: 'DELETE',
                    data: { "_token": $('meta[name="csrf-token"]').attr('content') },
                    success: function (data) {
                        Swal.fire('Terhapus!', data.success, 'success');
                        $('#row-' + id).fadeOut(); // Hapus baris dari tabel dengan animasi
                    }
                });
            }
        });
    }
</script>
@endpush
