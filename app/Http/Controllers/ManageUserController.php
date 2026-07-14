<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller {
    public function index() {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function destroy($id) {
        User::findOrFail($id)->delete();
        return response()->json(['success' => 'Data User berhasil dihapus!']);
    }
}
