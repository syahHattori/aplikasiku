<!DOCTYPE html>
<html>
<head><title>File Upload</title><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"></head>
<body>
<div class="container mt-5">
    <h2>Upload Gambar (Maks 2MB)</h2>
    @if (session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
        @error('file') <div class="invalid-feedback">{{ $message }}</div> @enderror
        <button type="submit" class="btn btn-primary mt-2">Upload</button>
    </form>
    <a href="{{ route('files.list') }}" class="btn btn-info mt-2">Lihat Daftar File</a>
</div>
</body>
</html>
