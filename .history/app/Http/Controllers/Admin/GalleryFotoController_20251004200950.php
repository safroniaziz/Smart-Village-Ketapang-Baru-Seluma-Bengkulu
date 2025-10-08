<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryFotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = GalleryFoto::query();

        // Filter by category if provided
        if ($request->has('kategori') && $request->kategori != '') {
            $query->byKategori($request->kategori);
        }

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%");
            });
        }

        // Sort by order and created date
        $galleries = $query->urutan()->paginate(12);

        // Get categories for filter
        $categories = GalleryFoto::getKategoriList();

        // Get category stats
        $categoryStats = GalleryFoto::selectRaw('kategori, COUNT(*) as count')
                                   ->groupBy('kategori')
                                   ->pluck('count', 'kategori');

        return view('admin.gallery-foto.index', compact('galleries', 'categories', 'categoryStats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = GalleryFoto::getKategoriList();
        return view('admin.gallery-foto.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|string',
            'url_foto' => 'required|url',
            'alt_text' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer|min:1',
            'photographer' => 'nullable|string|max:255',
            'tanggal_foto' => 'nullable|date',
            'is_hero' => 'nullable|boolean'
        ], [
            'judul.required' => 'Judul foto wajib diisi',
            'kategori.required' => 'Kategori wajib dipilih',
            'url_foto.required' => 'URL foto wajib diisi',
            'url_foto.url' => 'URL foto harus valid'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        // Set default order if not provided
        if (empty($data['urutan'])) {
            $maxOrder = GalleryFoto::where('kategori', $data['kategori'])->max('urutan') ?? 0;
            $data['urutan'] = $maxOrder + 1;
        }

        $data['status_aktif'] = true;

        $galleryFoto = GalleryFoto::create($data);

        // If this photo is set as hero, update all others
        if ($data['is_hero'] ?? false) {
            $galleryFoto->setAsHero();
        }

        return redirect()->route('admin.gallery-foto.index')
                        ->with('success', '🎉 Foto gallery berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(GalleryFoto $galleryFoto)
    {
        return view('admin.gallery-foto.show', compact('galleryFoto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryFoto $galleryFoto)
    {
        $categories = GalleryFoto::getKategoriList();
        return view('admin.gallery-foto.edit', compact('galleryFoto', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GalleryFoto $galleryFoto)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|string',
            'url_foto' => 'required|url',
            'alt_text' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer|min:1',
            'photographer' => 'nullable|string|max:255',
            'tanggal_foto' => 'nullable|date',
            'is_hero' => 'nullable|boolean'
        ], [
            'judul.required' => 'Judul foto wajib diisi',
            'kategori.required' => 'Kategori wajib dipilih',
            'url_foto.required' => 'URL foto wajib diisi',
            'url_foto.url' => 'URL foto harus valid'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        $galleryFoto->update($data);

        // If this photo is set as hero, update all others
        if ($data['is_hero'] ?? false) {
            $galleryFoto->setAsHero();
        }

        return redirect()->route('admin.gallery-foto.index')
                        ->with('success', '✅ Foto gallery berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryFoto $galleryFoto)
    {
        $galleryFoto->delete();

        return redirect()->route('admin.gallery-foto.index')
                        ->with('success', '🗑️ Foto gallery berhasil dihapus!');
    }

    /**
     * Toggle status aktif foto
     */
    public function toggleStatus(GalleryFoto $galleryFoto)
    {
        $galleryFoto->update([
            'status_aktif' => !$galleryFoto->status_aktif
        ]);

        $status = $galleryFoto->status_aktif ? 'diaktifkan' : 'dinonaktifkan';

        return redirect()->route('admin.gallery-foto.index')
                        ->with('success', "✅ Foto gallery berhasil {$status}!");
    }

    /**
     * Bulk action untuk multiple foto
     */
    public function bulkAction(Request $request)
    {
        $action = $request->action;
        $ids = $request->ids;

        if (empty($ids)) {
            return back()->with('error', '❌ Pilih minimal satu foto!');
        }

        switch ($action) {
            case 'activate':
                GalleryFoto::whereIn('id', $ids)->update(['status_aktif' => true]);
                return back()->with('success', '✅ Foto yang dipilih berhasil diaktifkan!');

            case 'deactivate':
                GalleryFoto::whereIn('id', $ids)->update(['status_aktif' => false]);
                return back()->with('success', '✅ Foto yang dipilih berhasil dinonaktifkan!');

            case 'delete':
                GalleryFoto::whereIn('id', $ids)->delete();
                return back()->with('success', '🗑️ Foto yang dipilih berhasil dihapus!');

            default:
                return back()->with('error', '❌ Aksi tidak valid!');
        }
    }
}
