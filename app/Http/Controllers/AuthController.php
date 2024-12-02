<?php
namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;


class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menampilkan form register
    public function showRegisterForm()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    // Menangani proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['username' => 'Username or password is incorrect']);
    }

    // Menangani proses register
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|unique:users,username',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|confirmed',
            'role_id' => 'required|exists:roles,id', // Pastikan role_id ada
        ]);

        // Membuat user baru
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;  // Menyimpan role_id
        $user->save();

        // Mengarahkan ke halaman login
        return redirect()->route('login')->with('success', 'Registration successful, please login.');
    }

    // Menangani proses logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Model User

    public function dashboard(){
        return view('layout.main');
    }    
}
