<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['comments', 'likes'])->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'SENDER' => 'required|string|max:255',
            'MESSAGE_TEXT' => 'required|string',
            'MESSAGE_GAMBAR' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('MESSAGE_GAMBAR')) {
            $data['MESSAGE_GAMBAR'] = $request->file('MESSAGE_GAMBAR')->store('images', 'public');
        }

        Post::create($data);
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function show($id)
    {
        $post = Post::with(['comments', 'likes'])->findOrFail($id);
        return view('posts.index', compact('post'));
    }
}
