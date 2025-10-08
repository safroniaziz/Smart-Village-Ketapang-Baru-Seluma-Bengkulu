<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PotensiWisata;

class PotensiWisataPublicController extends Controller
{
    /**
     * Display listing of tourism destinations for public
     */
    public function index(Request $request)
    {
        $query = PotensiWisata::query();

        // Filter by category
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

        // Get tourism destinations with pagination
        $wisata = $query->orderBy('urutan')
                       ->orderBy('created_at', 'desc')
                       ->paginate(12);

        // Get categories for filter
        $categories = PotensiWisata::query()
                                  ->select('kategori_wisata')
                                  ->distinct()
                                  ->pluck('kategori_wisata')
                                  ->filter();

        // Get featured destinations (first 6)
        $featured = PotensiWisata::query()
                                ->orderBy('urutan')
                                ->limit(6)
                                ->get();

        return view('potensi-wisata.index', compact('wisata', 'categories', 'featured'));
    }

    /**
     * Display detailed view of specific tourism destination
     */
    public function show($slug)
    {
        // Find by slug or ID for backward compatibility
        $wisata = PotensiWisata::query()
                              ->where('slug', $slug)
                              ->orWhere('id', $slug)
                              ->firstOrFail();

        // Increment view count
        $wisata->increment('jumlah_pengunjung');

        // Get main image for hero section
        $mainImage = $wisata->thumbnail;
        if (is_array($wisata->gambar) && count($wisata->gambar) > 0) {
            $mainImage = $wisata->gambar[0];
        }
        if (!$mainImage) {
            $mainImage = 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1200&h=800';
        }

        // Get related destinations (same category, different ID)
        $relatedWisata = PotensiWisata::query()
                                    ->where('kategori_wisata', $wisata->kategori_wisata)
                                    ->where('id', '!=', $wisata->id)
                                    ->orderBy('urutan')
                                    ->limit(4)
                                    ->get();

        return view('potensi-wisata.show', compact('wisata', 'relatedWisata', 'mainImage'));
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
