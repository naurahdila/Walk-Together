<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class imageController extends Controller
{
    public function upload(Request $request)
    {
        // Validasi gambar
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menyimpan gambar ke folder 'uploads' di public
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);

            // Mengembalikan URL gambar untuk disisipkan ke editor
            return response()->json(asset('uploads/' . $filename));
        }

        return response()->json(['error' => 'No image uploaded'], 400);
    }
}
