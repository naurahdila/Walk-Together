<?php 
namespace App\Http\Controllers;

use App\Models\article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class articleController extends Controller
{
    // Menampilkan daftar artikel untuk admin
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'newest');
        
        if ($sort == 'oldest') {
            $articles = Article::orderBy('created_at', 'asc')->get();
        } else {
            $articles = Article::orderBy('created_at', 'desc')->get();
        }
        
        return view('admin.articles.index', compact('articles'));
    }
    // Form untuk membuat artikel baru
    public function create()
    {
        return view('admin.articles.create');
    }

    // Menyimpan artikel baru
    public function store(Request $request)
{
    // Validasi input artikel dan gambar
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Gambar opsional
    ]);

    // Simpan artikel ke database
    $article = Article::create([
        'title' => $request->title,
        'content' => $request->content,
        'user_id' => Auth::id(),
        'is_published' => $request->has('is_published'), // Checkbox untuk publikasi
    ]);

    // Jika ada gambar yang diunggah
    if ($request->hasFile('image')) {
        // Nama gambar yang unik
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        
        // Pindahkan gambar ke folder 'uploads' di public directory
        $request->file('image')->move(public_path('uploads'), $imageName);
        
        // Update artikel dengan nama gambar
        $article->image = $imageName;
        $article->save();
    }

    return redirect()->route('admin.articles.index')->with('success', 'Article created successfully!');
}

    // Daftar artikel yang dilihat oleh user
    public function list()
    {
        $articles = Article::where('is_published', true)->get();
        return view('user.articles.list', compact('articles'));
    }

    // Menampilkan artikel tertentu
    public function show($id)
    {
        $article = Article::where('id', $id)->where('is_published', true)->firstOrFail();
        return view('user.articles.show', compact('article'));
    }


    public function likeArticle($id)
{
    $article = Article::findOrFail($id);
    $article->likes_count += 1;
    $article->save();
    
    return response()->json([
        'likes_count' => $article->likes_count
    ]);
}
}
