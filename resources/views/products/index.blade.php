@extends('layouts.app')
@section('content')
<div class="card shadow-sm border-success">
    <div class="card-header bg-success text-white"><h4>Data Produk (Server-Side)</h4></div>
    <div class="card-body">
        <table class="table table-bordered table-hover w-100" id="products-table">
            <thead class="table-dark">
                <tr><th>No</th><th>SKU</th><th>Nama Produk</th><th>Harga</th><th>Aksi</th></tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        var table = $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('products.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'sku', name: 'sku'},
                {data: 'name', name: 'name'},
                {data: 'formatted_price', name: 'price'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });

    function deleteProduct(id) {
        Swal.fire({
            title: 'Yakin hapus?',
            text: "Data akan hilang selamanya.",
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#888',
            confirmButtonText: 'Ya, Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/products/" + id,
                    type: 'DELETE',
                    data: { "_token": $('meta[name="csrf-token"]').attr('content') },
                    success: function (data) {
                        Swal.fire('Dihapus', data.success, 'success');
                        $('#products-table').DataTable().ajax.reload();
                    }
                });
            }
        });
    }
</script>
@endpush
