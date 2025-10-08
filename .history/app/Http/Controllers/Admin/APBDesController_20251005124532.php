<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\APBDes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APBDesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = APBDes::query();

        // Filter berdasarkan tahun
        if ($request->filled('tahun')) {
            $query->byYear($request->tahun);
        }

        // Filter berdasarkan jenis anggaran
        if ($request->filled('jenis')) {
            if ($request->jenis === 'pendapatan') {
                $query->pendapatan();
            } elseif ($request->jenis === 'belanja') {
                $query->belanja();
            }
        }

        // Search
        if ($request->filled('search')) {
            $query->where('keterangan', 'like', '%' . $request->search . '%');
        }

        $apbdes = $query->orderBy('tahun_anggaran', 'desc')
                       ->orderBy('jenis_anggaran')
                       ->paginate(20);

        // Stats untuk dashboard
        $stats = [
            'total' => APBDes::count(),
            'total_pendapatan' => APBDes::pendapatan()->sum('anggaran'),
            'total_belanja' => APBDes::belanja()->sum('anggaran'),
            'tahun_aktif' => APBDes::distinct()->pluck('tahun_anggaran')->sortDesc()->first() ?? date('Y')
        ];

        return view('admin.apbdes.index', compact('apbdes', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.apbdes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun_anggaran' => 'required|integer|min:2020|max:2030',
            'jenis_anggaran' => 'required|in:pendapatan,belanja',
            'keterangan' => 'required|string|max:255',
            'anggaran' => 'required|numeric|min:0',
            'keterangan_detail' => 'nullable|string'
        ]);

        try {
            APBDes::create($validated);
            
            return redirect()->route('admin.apbdes.index')
                           ->with('success', 'Data APBDes berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Gagal menambahkan data APBDes: ' . $e->getMessage())
                           ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(APBDes $apbdes)
    {
        return view('admin.apbdes.show', compact('apbdes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(APBDes $apbdes)
    {
        return view('admin.apbdes.edit', compact('apbdes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, APBDes $apbdes)
    {
        $validated = $request->validate([
            'tahun_anggaran' => 'required|integer|min:2020|max:2030',
            'jenis_anggaran' => 'required|in:pendapatan,belanja',
            'keterangan' => 'required|string|max:255',
            'anggaran' => 'required|numeric|min:0',
            'keterangan_detail' => 'nullable|string'
        ]);

        try {
            $apbdes->update($validated);
            
            return redirect()->route('admin.apbdes.index')
                           ->with('success', 'Data APBDes berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Gagal memperbarui data APBDes: ' . $e->getMessage())
                           ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(APBDes $apbdes)
    {
        try {
            $apbdes->delete();
            
            return redirect()->route('admin.apbdes.index')
                           ->with('success', 'Data APBDes berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Gagal menghapus data APBDes: ' . $e->getMessage());
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
            'items.*.jenis_anggaran' => 'required|in:pendapatan,belanja',
            'items.*.keterangan' => 'required|string|max:255',
            'items.*.anggaran' => 'required|numeric|min:0',
            'items.*.keterangan_detail' => 'nullable|string'
        ]);

        try {
            DB::beginTransaction();
            
            foreach ($request->items as $item) {
                APBDes::create($item);
            }
            
            DB::commit();
            
            return response()->json([
                'success' => true,
                'message' => 'Data APBDes berhasil diimpor sebanyak ' . count($request->items) . ' item'
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
