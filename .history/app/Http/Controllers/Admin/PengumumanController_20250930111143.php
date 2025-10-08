<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengumuman = Pengumuman::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengumuman.create');
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
            'prioritas' => 'required|in:tinggi,sedang,rendah',
            'penulis' => 'nullable|string|max:100',
            'published' => 'boolean',
            'tanggal_berakhir' => 'required|date|after:today',
        ]);

        $pengumuman = new Pengumuman();
        $pengumuman->judul = $request->judul;
        $pengumuman->slug = Str::slug($request->judul);
        $pengumuman->excerpt = $request->excerpt;
        $pengumuman->konten = $request->konten;
        $pengumuman->prioritas = $request->prioritas;
        $pengumuman->penulis = $request->penulis ?: 'Admin Desa';
        $pengumuman->published = $request->has('published');
        $pengumuman->tanggal_berakhir = $request->tanggal_berakhir;
        $pengumuman->tanggal_publikasi = $request->has('published') ? now() : null;
        $pengumuman->views = 0;
        $pengumuman->save();

        return redirect()->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('admin.pengumuman.show', compact('pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'konten' => 'required|string',
            'prioritas' => 'required|in:tinggi,sedang,rendah',
            'penulis' => 'nullable|string|max:100',
            'published' => 'boolean',
            'tanggal_berakhir' => 'required|date|after:today',
        ]);

        $pengumuman->judul = $request->judul;
        $pengumuman->slug = Str::slug($request->judul);
        $pengumuman->excerpt = $request->excerpt;
        $pengumuman->konten = $request->konten;
        $pengumuman->prioritas = $request->prioritas;
        $pengumuman->penulis = $request->penulis ?: 'Admin Desa';
        $pengumuman->published = $request->has('published');
        $pengumuman->tanggal_berakhir = $request->tanggal_berakhir;
        $pengumuman->tanggal_publikasi = $request->has('published') ? now() : null;
        $pengumuman->save();

        return redirect()->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();

        return redirect()->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus!');
    }
}
