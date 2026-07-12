<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white">Dashboard Praktikum 2</div>
                <div class="card-body text-center">
                    @if(session('success'))
                        <div class="alert alert-info">{{ session('success') }}</div>
                    @endif
                    <p class="lead">Selamat datang kembali, <strong>{{ auth()->user()->email ?? 'Guest' }}</strong></p>
                    <h1>Halaman Dashboard Manual</h1>
                    <a href="{{ route('logout.manual') }}" class="btn btn-danger mt-3">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
