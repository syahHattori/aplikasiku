<div style="border: 2px solid green; padding: 20px;">
    <h1>🎉 Halaman Khusus Dewasa (Tugas Modul 7)</h1>
    <h3>Nama Pengguna: {{ Auth::user()->name }}</h3>
    <h3>Role Pengguna: {{ Auth::user()->role }}</h3>
    <p>Selamat! Kamu berhasil mengakses halaman ini karena usiamu sudah memenuhi syarat (18+).</p>
    <a href="{{ route('home-custom') }}">Kembali ke Home</a>
</div>
