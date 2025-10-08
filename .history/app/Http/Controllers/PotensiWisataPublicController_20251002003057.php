<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PotensiWisata;

class PotensiWisataPublicController extends Controller
{
    /**
     * Display single tourism destination (Pantai Ancol Seluma)
     */
    public function index(Request $request)
    {
        // Get the single destination
        $wisata = PotensiWisata::first();
        
        $galleryPhotos = [];
        $galleryCount = 0;
        $youtubeId = null;
        
        if ($wisata) {
            // Process gallery photos
            $galleryPhotos = is_array($wisata->gambar) ? $wisata->gambar : [];
            $galleryCount = count($galleryPhotos);
            
            // Extract YouTube ID from URL
            if ($wisata->video_youtube) {
                if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $wisata->video_youtube, $matches)) {
                    $youtubeId = $matches[1];
                }
            }
            
            // Increment views
            $wisata->increment('views');
        }

        return view('pages.potensi-wisata', compact('wisata', 'galleryPhotos', 'galleryCount', 'youtubeId'));
    }

    /**
     * Display detailed view of specific tourism destination
     */
    public function show($slugOrId)
    {
        // Find by slug first, then by ID for backward compatibility
        $wisata = PotensiWisata::query()
                              ->where('slug', $slugOrId)
                              ->first();

        if (!$wisata) {
            $wisata = PotensiWisata::findOrFail($slugOrId);
        }

        $galleryPhotos = [];
        $galleryCount = 0;
        $youtubeId = null;
        
        if ($wisata) {
            // Process gallery photos
            $galleryPhotos = is_array($wisata->gambar) ? $wisata->gambar : [];
            $galleryCount = count($galleryPhotos);
            
            // Extract YouTube ID from URL
            if ($wisata->video_youtube) {
                if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $wisata->video_youtube, $matches)) {
                    $youtubeId = $matches[1];
                }
            }
        }

        return view('pages.potensi-wisata', compact('wisata', 'galleryPhotos', 'galleryCount', 'youtubeId'));
    }
    
    /**
     * Increment views counter via AJAX
     */
    public function incrementViews($id)
    {
        $wisata = PotensiWisata::findOrFail($id);
        $wisata->increment('views');
        
        return response()->json(['success' => true, 'views' => $wisata->views]);
    }

    /**
     * Get destinations by category for AJAX requests
     */
    public function getByCategory(Request $request)
    {
        $kategori = $request->get('kategori');

        $wisata = PotensiWisata::query()
                              ->when($kategori, function ($query) use ($kategori) {
                                  return $query->where('kategori_wisata', $kategori);
                              })
                              ->orderBy('urutan')
                              ->get(['id', 'nama', 'lokasi', 'thumbnail', 'kategori_wisata']);

        return response()->json($wisata);
    }

    /**
     * Get popular destinations (most viewed)
     */
    public function popular()
    {
        $wisata = PotensiWisata::query()
                              ->orderBy('jumlah_pengunjung', 'desc')
                              ->orderBy('urutan')
                              ->paginate(12);

        $categories = PotensiWisata::query()
                                  ->select('kategori_wisata')
                                  ->distinct()
                                  ->pluck('kategori_wisata')
                                  ->filter();

        return view('potensi-wisata.popular', compact('wisata', 'categories'));
    }

    /**
     * Search destinations
     */
    public function search(Request $request)
    {
        $query = $request->get('q', '');

        $wisata = PotensiWisata::query()
                              ->where(function ($q) use ($query) {
                                  $q->where('nama', 'like', "%{$query}%")
                                    ->orWhere('lokasi', 'like', "%{$query}%")
                                    ->orWhere('deskripsi', 'like', "%{$query}%");
                              })
                              ->orderBy('urutan')
                              ->paginate(12);

        return view('potensi-wisata.search', compact('wisata', 'query'));
    }

    /**
     * Get map data for all destinations
     */
    public function mapData()
    {
        $wisata = PotensiWisata::query()
                              ->whereNotNull('latitude')
                              ->whereNotNull('longitude')
                              ->get(['id', 'nama', 'lokasi', 'thumbnail', 'latitude', 'longitude', 'kategori_wisata']);

        return response()->json($wisata);
    }
}
