<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PotensiWisata;
use App\Services\ImageProcessingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PotensiWisataController extends Controller
{
    protected $imageProcessor;

    public function __construct(ImageProcessingService $imageProcessor)
    {
        $this->imageProcessor = $imageProcessor;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PotensiWisata::query();

        // Filter by category if provided
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori_wisata', $request->kategori);
        }

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('lokasi', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        // Sort by order and created date
        $wisata = $query->orderBy('urutan')
                       ->orderBy('created_at', 'desc')
                       ->paginate(12);

        // Get categories for filter
        $categories = PotensiWisata::select('kategori_wisata')
                                  ->distinct()
                                  ->pluck('kategori_wisata')
                                  ->filter();

        return view('admin.potensi-wisata.index', compact('wisata', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.potensi-wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'kategori_wisata' => 'required|in:pantai,gunung,air_terjun,sejarah,budaya,kuliner,religi,alam,adventure',
            'jam_operasional' => 'required|string|max:100',
            'tiket_masuk' => 'required|string|max:100',
            'kontak' => 'nullable|string|max:50',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'gambar' => 'required|array|min:1',
            'gambar.*' => 'url',
            'video_youtube' => 'nullable|url',
            'fasilitas' => 'required|array|min:1',
            'thumbnail' => 'nullable|url',
            'urutan' => 'nullable|integer|min:1'
        ], [
            'nama.required' => 'Nama wisata wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'lokasi.required' => 'Lokasi wajib diisi',
            'kategori_wisata.required' => 'Kategori wisata wajib dipilih',
            'jam_operasional.required' => 'Jam operasional wajib diisi',
            'tiket_masuk.required' => 'Informasi tiket masuk wajib diisi',
            'gambar.required' => 'Minimal satu gambar harus diupload',
            'gambar.*.url' => 'Format gambar harus berupa URL yang valid',
            'video_youtube.url' => 'URL YouTube tidak valid',
            'fasilitas.required' => 'Minimal satu fasilitas harus dipilih'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        // Set thumbnail as first image if not provided
        if (empty($data['thumbnail'])) {
            $data['thumbnail'] = $data['gambar'][0];
        }

        // Set default order if not provided
        if (empty($data['urutan'])) {
            $maxOrder = PotensiWisata::max('urutan') ?? 0;
            $data['urutan'] = $maxOrder + 1;
        }

        $data['status_aktif'] = true;

        PotensiWisata::create($data);

        return redirect()->route('admin.potensi-wisata.index')
                        ->with('success', '🎉 Potensi wisata berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PotensiWisata $potensiWisata)
    {
        return view('admin.potensi-wisata.show', compact('potensiWisata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PotensiWisata $potensiWisata)
    {
        return view('admin.potensi-wisata.edit', compact('potensiWisata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PotensiWisata $potensiWisata)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'kategori_wisata' => 'required|in:pantai,gunung,air_terjun,sejarah,budaya,kuliner,religi,alam,adventure',
            'jam_operasional' => 'required|string|max:100',
            'tiket_masuk' => 'required|string|max:100',
            'kontak' => 'nullable|string|max:50',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'gambar' => 'required|array|min:1',
            'gambar.*' => 'url',
            'video_youtube' => 'nullable|url',
            'fasilitas' => 'required|array|min:1',
            'thumbnail' => 'nullable|url',
            'urutan' => 'nullable|integer|min:1'
        ], [
            'nama.required' => 'Nama wisata wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'lokasi.required' => 'Lokasi wajib diisi',
            'kategori_wisata.required' => 'Kategori wisata wajib dipilih',
            'jam_operasional.required' => 'Jam operasional wajib diisi',
            'tiket_masuk.required' => 'Informasi tiket masuk wajib diisi',
            'gambar.required' => 'Minimal satu gambar harus diupload',
            'gambar.*.url' => 'Format gambar harus berupa URL yang valid',
            'video_youtube.url' => 'URL YouTube tidak valid',
            'fasilitas.required' => 'Minimal satu fasilitas harus dipilih'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        // Set thumbnail as first image if not provided
        if (empty($data['thumbnail'])) {
            $data['thumbnail'] = $data['gambar'][0];
        }

        $potensiWisata->update($data);

        return redirect()->route('admin.potensi-wisata.index')
                        ->with('success', '✅ Potensi wisata berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PotensiWisata $potensiWisata)
    {
        $nama = $potensiWisata->nama;
        $potensiWisata->delete();

        return redirect()->route('admin.potensi-wisata.index')
                        ->with('success', "🗑️ Potensi wisata '{$nama}' berhasil dihapus!");
    }

    /**
     * Bulk actions for multiple items
     */
    public function bulkAction(Request $request)
    {
        $action = $request->input('bulk_action');
        $ids = $request->input('selected_items', []);

        if (empty($ids)) {
            return back()->with('error', 'Pilih minimal satu item untuk diproses');
        }

        switch ($action) {
            case 'delete':
                PotensiWisata::whereIn('id', $ids)->delete();
                return back()->with('success', 'Item terpilih berhasil dihapus');

            case 'activate':
                PotensiWisata::whereIn('id', $ids)->update(['status_aktif' => true]);
                return back()->with('success', 'Item terpilih berhasil diaktifkan');

            case 'deactivate':
                PotensiWisata::whereIn('id', $ids)->update(['status_aktif' => false]);
                return back()->with('success', 'Item terpilih berhasil dinonaktifkan');

            default:
                return back()->with('error', 'Aksi tidak valid');
        }
    }

    /**
     * Toggle status aktif
     */
    public function toggleStatus(PotensiWisata $potensiWisata)
    {
        $potensiWisata->update([
            'status_aktif' => !$potensiWisata->status_aktif
        ]);

        $status = $potensiWisata->status_aktif ? 'diaktifkan' : 'dinonaktifkan';

        return response()->json([
            'success' => true,
            'message' => "Status wisata berhasil {$status}",
            'status' => $potensiWisata->status_aktif
        ]);
    }

    /**
     * Add new gallery photo (support both URL and file upload)
     */
    public function addGalleryPhoto(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'source_type' => 'required|in:upload,url',
            'photo' => 'required_if:source_type,upload|image|mimes:jpeg,jpg,png,webp|max:10240',
            'photo_url' => 'required_if:source_type,url|url',
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $wisata = PotensiWisata::findOrFail($id);
            
            // Determine source
            $source = null;
            if ($request->source_type === 'upload') {
                $source = $request->file('photo');
            } else {
                $source = $request->photo_url;
            }
            
            // Process image using the enhanced service
            $galleryData = [[
                'source' => $source,
                'judul' => $request->judul,
                'keterangan' => $request->keterangan
            ]];
            
            $processedPhotos = $this->imageProcessor->processMixedGalleryData($galleryData);
            
            if (empty($processedPhotos)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to process image'
                ], 500);
            }

            // Add to existing gallery
            $currentGallery = is_array($wisata->gambar) ? $wisata->gambar : [];
            $newGallery = array_merge($currentGallery, $processedPhotos);
            
            $wisata->update(['gambar' => $newGallery]);

            return response()->json([
                'success' => true,
                'message' => 'Foto berhasil ditambahkan ke gallery!',
                'photo' => $processedPhotos[0]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update gallery photo details
     */
    public function updateGalleryPhoto(Request $request, $id, $photoIndex)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $wisata = PotensiWisata::findOrFail($id);
            $gallery = is_array($wisata->gambar) ? $wisata->gambar : [];

            if (!isset($gallery[$photoIndex])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Foto tidak ditemukan'
                ], 404);
            }

            // Update photo details
            $gallery[$photoIndex]['judul'] = $request->judul;
            $gallery[$photoIndex]['keterangan'] = $request->keterangan;
            $gallery[$photoIndex]['updated_at'] = now()->toISOString();

            $wisata->update(['gambar' => $gallery]);

            return response()->json([
                'success' => true,
                'message' => 'Detail foto berhasil diperbarui!',
                'photo' => $gallery[$photoIndex]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete gallery photo
     */
    public function deleteGalleryPhoto(Request $request, $id, $photoIndex)
    {
        try {
            $wisata = PotensiWisata::findOrFail($id);
            $gallery = is_array($wisata->gambar) ? $wisata->gambar : [];

            if (!isset($gallery[$photoIndex])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Foto tidak ditemukan'
                ], 404);
            }

            $photoToDelete = $gallery[$photoIndex];
            
            // Delete associated files if they exist in storage
            if (isset($photoToDelete['url']) && strpos($photoToDelete['url'], 'storage/') !== false) {
                $filename = str_replace(asset('storage/'), '', $photoToDelete['url']);
                Storage::disk('public')->delete($filename);
            }
            
            if (isset($photoToDelete['original_url']) && strpos($photoToDelete['original_url'], 'storage/') !== false) {
                $filename = str_replace(asset('storage/'), '', $photoToDelete['original_url']);
                Storage::disk('public')->delete($filename);
            }

            // Remove from gallery array
            array_splice($gallery, $photoIndex, 1);
            
            $wisata->update(['gambar' => array_values($gallery)]);

            return response()->json([
                'success' => true,
                'message' => 'Foto berhasil dihapus dari gallery!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Bulk import photos from URLs (for admin convenience)  
     */
    public function bulkImportFromUrls(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'urls' => 'required|array|min:1',
            'urls.*.url' => 'required|url',
            'urls.*.judul' => 'required|string|max:255',
            'urls.*.keterangan' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $wisata = PotensiWisata::findOrFail($id);
            
            // Prepare gallery data for processing
            $galleryData = [];
            foreach ($request->urls as $urlData) {
                $galleryData[] = [
                    'source' => $urlData['url'],
                    'judul' => $urlData['judul'],
                    'keterangan' => $urlData['keterangan'] ?? null
                ];
            }
            
            // Process all images
            $processedPhotos = $this->imageProcessor->processMixedGalleryData($galleryData);

            if (empty($processedPhotos)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to process any of the provided URLs'
                ], 500);
            }

            // Add to existing gallery
            $currentGallery = is_array($wisata->gambar) ? $wisata->gambar : [];
            $newGallery = array_merge($currentGallery, $processedPhotos);
            
            $wisata->update(['gambar' => $newGallery]);

            return response()->json([
                'success' => true,
                'message' => count($processedPhotos) . ' foto berhasil diimpor ke gallery!',
                'processed_count' => count($processedPhotos),
                'total_count' => count($request->urls)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
