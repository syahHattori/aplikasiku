<h2>Welcome, {{ Auth::user()->name }}</h2>
<p>Role: {{ Auth::user()->role }} | Usia: {{ Auth::user()->usia }} Tahun</p>
@if(session('error')) <h3 style="color:red">{{ session('error') }}</h3> @endif
<ul>
    <li><a href="{{ route('admin') }}">Menu Admin</a></li>
    <li><a href="{{ route('owner') }}">Menu Owner</a></li>
    <li><a href="{{ route('dewasa') }}">Menu Khusus Dewasa (Tugas)</a></li>
    <li><a href="{{ route('logout-custom') }}">Logout</a></li>
</ul>
