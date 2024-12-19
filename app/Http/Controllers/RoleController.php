<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    // Menampilkan semua role
    public function index()
    {
        $roles = DB::table('roles')->get();
        return view('admin.roles.index', compact('roles'));
    }

    // Menampilkan form untuk membuat role baru
    public function create()
    {
        return view('admin.roles.create');
    }

    // Menyimpan role baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
        ]);

        // Insert data role ke tabel 'roles'
        DB::table('roles')->insert([
            'name' => $request->input('name'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect ke halaman role index dengan pesan sukses
        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully!');
    }

    // Menampilkan form edit role
    public function edit($id)
    {
        $role = DB::table('roles')->where('id', $id)->first();

        // Jika role tidak ditemukan
        if (!$role) {
            return redirect()->route('admin.roles.index')->with('error', 'Role not found.');
        }

        return view('admin.roles.edit', compact('role'));
    }

    // Update data role
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $affected = DB::table('roles')->where('id', $id)->update([
            'name' => $request->input('name'),
            'updated_at' => now(),
        ]);

        if ($affected) {
            return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully!');
        } else {
            return redirect()->route('admin.roles.index')->with('error', 'Failed to update role.');
        }
    }

    // Menghapus role
    public function destroy($id)
    {
        $role = DB::table('roles')->where('id', $id)->first();

        if (!$role) {
            return redirect()->route('admin.roles.index')->with('error', 'Role not found.');
        }

        DB::table('roles')->where('id', $id)->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully!');
    }
}
