<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'konten' => 'required|string',
            'kategori' => 'nullable|string|max:100',
            'penulis' => 'nullable|string|max:100',
            'featured' => 'boolean',
            'published' => 'boolean',
        ]);

        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->slug = Str::slug($request->judul);
        $berita->excerpt = $request->excerpt;
        $berita->konten = $request->konten;
        $berita->kategori = $request->kategori;
        $berita->penulis = $request->penulis ?: 'Admin Desa';
        $berita->featured = $request->has('featured');
        $berita->published = $request->has('published');
        $berita->views = 0;
        $berita->read_time = $this->calculateReadTime($request->konten);
        $berita->tanggal_publikasi = $request->has('published') ? now() : null;
        $berita->save();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        return view('admin.berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'konten' => 'required|string',
            'kategori' => 'nullable|string|max:100',
            'penulis' => 'nullable|string|max:100',
            'featured' => 'boolean',
            'published' => 'boolean',
        ]);

        $berita->judul = $request->judul;
        $berita->slug = Str::slug($request->judul);
        $berita->excerpt = $request->excerpt;
        $berita->konten = $request->konten;
        $berita->kategori = $request->kategori;
        $berita->penulis = $request->penulis ?: 'Admin Desa';
        $berita->featured = $request->has('featured');
        $berita->published = $request->has('published');
        $berita->read_time = $this->calculateReadTime($request->konten);
        $berita->save();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus!');
    }

    /**
     * Calculate reading time based on content
     */
    private function calculateReadTime($content)
    {
        $wordCount = str_word_count(strip_tags($content));
        $readTime = ceil($wordCount / 200); // Average reading speed: 200 words per minute
        return max(1, $readTime); // Minimum 1 minute
    }
}
