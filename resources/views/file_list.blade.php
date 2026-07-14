<!DOCTYPE html>
<html>
<head><title>File List</title><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"></head>
<body>
<div class="container mt-5">
    <h2>Daftar File</h2>
    @if (session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    <table class="table">
        @foreach ($files as $file)
        <tr>
            <td>{{ basename($file) }}</td>
            <td><a href="{{ Storage::url($file) }}" download class="btn btn-sm btn-success">Download</a></td>
            <td>
                <form action="{{ route('files.delete', basename($file)) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <a href="{{ route('upload.form') }}" class="btn btn-secondary">Kembali ke Upload</a>
</div>
</body>
</html>
