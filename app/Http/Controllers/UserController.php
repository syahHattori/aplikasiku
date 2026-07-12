<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    public function showLoginForm() { return view('login_custom'); }
    
    public function login(Request $request) {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('home-custom');
        }
        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }
    
    public function showHome() { return view('home_custom'); }
    public function showAdmin() { return view('admin'); }
    public function showOwner() { return view('owner'); }
    public function showDewasa() { return view('dewasa'); } // Untuk Tugas
    
    public function logout() {
        Auth::logout();
        return redirect('login-custom');
    }
}
