<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::published()->orderByDesc('tanggal_publikasi');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('konten', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        // Featured filter
        if ($request->filled('featured') && $request->featured == '1') {
            $query->featured();
        }

        $beritas = $query->paginate(9)->withQueryString();
        $featuredBerita = Berita::published()->featured()->latest('tanggal_publikasi')->first();
        
        return view('pages.berita', compact('beritas', 'featuredBerita'));
    }

    public function show(Berita $berita)
    {
        // Increment views
        $berita->increment('views');
        
        // Get related news (same category or recent)
        $relatedBerita = Berita::published()
            ->where('id', '!=', $berita->id)
            ->orderByDesc('tanggal_publikasi')
            ->limit(3)
            ->get();

        return view('pages.berita-detail', compact('berita', 'relatedBerita'));
    }
}
