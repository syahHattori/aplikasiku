<h2>Login Custom Modul 7</h2>
@if ($errors->any()) <div style="color:red">{{ $errors->first() }}</div> @endif
<form method="POST" action="{{ route('login-custom.post') }}">
    @csrf
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
