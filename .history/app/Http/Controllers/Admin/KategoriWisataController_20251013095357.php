<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = KategoriWisata::urutan()->paginate(15);
        return view('admin.kategori-wisata.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori-wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:kategori_wisata,nama',
            'deskripsi' => 'nullable|string|max:1000',
            'icon' => 'required|string|max:50',
            'warna' => 'required|string|max:20',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'boolean'
        ], [
            'nama.required' => 'Nama kategori wajib diisi',
            'nama.unique' => 'Nama kategori sudah ada',
            'icon.required' => 'Icon wajib diisi',
            'warna.required' => 'Warna wajib diisi'
        ]);

        KategoriWisata::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'deskripsi' => $request->deskripsi,
            'icon' => $request->icon,
            'warna' => $request->warna,
            'urutan' => $request->urutan ?? 0,
            'aktif' => $request->has('aktif')
        ]);

        return redirect()->route('admin.kategori-wisata.index')
            ->with('success', 'Kategori wisata berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriWisata $kategoriWisata)
    {
        $kategoriWisata->load('potensiWisata');
        return view('admin.kategori-wisata.show', compact('kategoriWisata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriWisata $kategoriWisata)
    {
        return view('admin.kategori-wisata.edit', compact('kategoriWisata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriWisata $kategoriWisata)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:kategori_wisata,nama,' . $kategoriWisata->id,
            'deskripsi' => 'nullable|string|max:1000',
            'icon' => 'required|string|max:50',
            'warna' => 'required|string|max:20',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'boolean'
        ], [
            'nama.required' => 'Nama kategori wajib diisi',
            'nama.unique' => 'Nama kategori sudah ada',
            'icon.required' => 'Icon wajib diisi',
            'warna.required' => 'Warna wajib diisi'
        ]);

        $kategoriWisata->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'deskripsi' => $request->deskripsi,
            'icon' => $request->icon,
            'warna' => $request->warna,
            'urutan' => $request->urutan ?? 0,
            'aktif' => $request->has('aktif')
        ]);

        return redirect()->route('admin.kategori-wisata.index')
            ->with('success', 'Kategori wisata berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriWisata $kategoriWisata)
    {
        // Check if category has associated wisata
        if ($kategoriWisata->potensiWisata()->count() > 0) {
            return redirect()->route('admin.kategori-wisata.index')
                ->with('error', 'Tidak dapat menghapus kategori yang memiliki potensi wisata!');
        }

        $kategoriWisata->delete();

        return redirect()->route('admin.kategori-wisata.index')
            ->with('success', 'Kategori wisata berhasil dihapus!');
    }
}