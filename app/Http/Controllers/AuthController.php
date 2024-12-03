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
        $table= [
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $request->role_id,
        ];

        User::create($table);

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
