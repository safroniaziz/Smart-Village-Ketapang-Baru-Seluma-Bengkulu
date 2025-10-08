<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengumuman::published()->byPriority();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('konten', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        // Priority filter
        if ($request->filled('prioritas')) {
            $query->where('prioritas', $request->prioritas);
        }

        // Active filter (not expired)
        if ($request->filled('status')) {
            if ($request->status == 'active') {
                $query->active();
            } elseif ($request->status == 'expired') {
                $query->where('tanggal_berakhir', '<', now());
            }
        }

        $pengumumans = $query->paginate(8)->withQueryString();
        
        // Get urgent announcements for hero section
        $urgentPengumuman = Pengumuman::published()
            ->active()
            ->where('prioritas', 'Tinggi')
            ->latest('tanggal_publikasi')
            ->first();
        
        return view('pages.pengumuman', compact('pengumumans', 'urgentPengumuman'));
    }

    public function show(Pengumuman $pengumuman)
    {
        // Increment views
        $pengumuman->increment('views');
        
        // Get related announcements
        $relatedPengumuman = Pengumuman::published()
            ->active()
            ->where('id', '!=', $pengumuman->id)
            ->where('prioritas', $pengumuman->prioritas)
            ->orderByDesc('tanggal_publikasi')
            ->limit(3)
            ->get();

        // If not enough related by priority, get recent ones
        if ($relatedPengumuman->count() < 3) {
            $additionalCount = 3 - $relatedPengumuman->count();
            $additional = Pengumuman::published()
                ->active()
                ->where('id', '!=', $pengumuman->id)
                ->whereNotIn('id', $relatedPengumuman->pluck('id'))
                ->orderByDesc('tanggal_publikasi')
                ->limit($additionalCount)
                ->get();
            
            $relatedPengumuman = $relatedPengumuman->concat($additional);
        }

        return view('pages.pengumuman-detail', compact('pengumuman', 'relatedPengumuman'));
    }
}
