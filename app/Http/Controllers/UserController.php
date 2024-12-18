<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan semua user
    public function index()
    {
        $users = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.*', 'roles.username as role_name')
            ->get();

        return view('admin.users.index', compact('users'));
    }

    // Menampilkan form untuk membuat user baru
    public function create()
    {
        // Mendapatkan semua roles untuk dropdown
        $roles = DB::table('roles')->get();

        return view('admin.users.create', compact('roles'));
    }

    // Menyimpan user baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',  // Menambahkan validasi password
            'role_id' => 'required|exists:roles,id',
        ]);

        // Hash password sebelum menyimpannya
        $hashedPassword = Hash::make($validated['password']);

        DB::table('users')->insert([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => $hashedPassword,  // Menyimpan password yang sudah di-hash
            'role_id' => $validated['role_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }

    // Menampilkan form edit user
    public function edit($id)
    {
        // Menampilkan user yang ingin diedit dan semua roles
        $user = DB::table('users')->where('id', $id)->first();
        $roles = DB::table('roles')->get();

        if (!$user) {
            return redirect()->route('admin.users.index')->with('error', 'User not found.');
        }

        return view('admin.users.edit', compact('user', 'roles'));
    }

    // Update data user
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role_id' => 'required|exists:roles,id',
            'password' => 'nullable|string|min:8',  // Password opsional untuk update
        ]);

        // Jika password diisi, lakukan hashing
        $dataToUpdate = [
            'username' => $validated['username'],
            'email' => $validated['email'],
            'role_id' => $validated['role_id'],
            'updated_at' => now(),
        ];

        if (!empty($validated['password'])) {
            $dataToUpdate['password'] = Hash::make($validated['password']);  // Hash password baru
        }

        $affected = DB::table('users')->where('id', $id)->update($dataToUpdate);

        if ($affected) {
            return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
        } else {
            return redirect()->route('admin.users.index')->with('error', 'Failed to update user.');
        }
    }

    // Menghapus user
    public function destroy($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if (!$user) {
            return redirect()->route('admin.users.index')->with('error', 'User not found.');
        }

        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }
}
