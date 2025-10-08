<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaguEarmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaguEarmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PaguEarmark::query();

        // Filter berdasarkan tahun
        if ($request->filled('tahun')) {
            $query->byYear($request->tahun);
        }

        // Search
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('kegiatan', 'like', '%' . $request->search . '%')
                  ->orWhere('keterangan', 'like', '%' . $request->search . '%');
            });
        }

        $paguEarmarks = $query->orderBy('tahun_anggaran', 'desc')
                             ->orderBy('jumlah_pagu', 'desc')
                             ->paginate(20);

        // Stats untuk dashboard
        $stats = [
            'total' => PaguEarmark::count(),
            'total_pagu' => PaguEarmark::sum('jumlah_pagu'),
            'tahun_aktif' => PaguEarmark::distinct()->pluck('tahun_anggaran')->sortDesc()->first() ?? date('Y'),
            'kegiatan_terbesar' => PaguEarmark::orderBy('jumlah_pagu', 'desc')->first()
        ];

        return view('admin.pagu-earmark.index', compact('paguEarmarks', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pagu-earmark.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun_anggaran' => 'required|integer|min:2020|max:2030',
            'kegiatan' => 'required|string|max:255',
            'satuan' => 'required|string|max:100',
            'jumlah_pagu' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string'
        ]);

        try {
            PaguEarmark::create($validated);

            return redirect()->route('admin.pagu-earmark.index')
                           ->with('success', 'Data Pagu Earmark berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Gagal menambahkan data Pagu Earmark: ' . $e->getMessage())
                           ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PaguEarmark $paguEarmark)
    {
        return view('admin.pagu-earmark.show', compact('paguEarmark'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaguEarmark $paguEarmark)
    {
        return view('admin.pagu-earmark.edit', compact('paguEarmark'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaguEarmark $paguEarmark)
    {
        $validated = $request->validate([
            'tahun_anggaran' => 'required|integer|min:2020|max:2030',
            'kegiatan' => 'required|string|max:255',
            'satuan' => 'required|string|max:100',
            'jumlah_pagu' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string'
        ]);

        try {
            $paguEarmark->update($validated);

            return redirect()->route('admin.pagu-earmark.index')
                           ->with('success', 'Data Pagu Earmark berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Gagal memperbarui data Pagu Earmark: ' . $e->getMessage())
                           ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaguEarmark $paguEarmark)
    {
        try {
            $paguEarmark->delete();

            return redirect()->route('admin.pagu-earmark.index')
                           ->with('success', 'Data Pagu Earmark berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Gagal menghapus data Pagu Earmark: ' . $e->getMessage());
        }
    }

    /**
     * Bulk import data
     */
    public function bulkStore(Request $request)
    {
        $request->validate([
            'items' => 'required|array|min:1',
            'items.*.tahun_anggaran' => 'required|integer|min:2020|max:2030',
            'items.*.kegiatan' => 'required|string|max:255',
            'items.*.satuan' => 'required|string|max:100',
            'items.*.jumlah_pagu' => 'required|numeric|min:0',
            'items.*.keterangan' => 'nullable|string'
        ]);

        try {
            DB::beginTransaction();

            foreach ($request->items as $item) {
                PaguEarmark::create($item);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data Pagu Earmark berhasil diimpor sebanyak ' . count($request->items) . ' item'
            ]);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                'success' => false,
                'message' => 'Gagal mengimpor data: ' . $e->getMessage()
            ], 500);
        }
    }
}
