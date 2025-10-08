<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BltDd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BltDdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = BltDd::query();

        // Filter berdasarkan tahun
        if ($request->filled('tahun')) {
            $query->byYear($request->tahun);
        }

        // Filter berdasarkan jenis kelamin
        if ($request->filled('jenis_kelamin')) {
            if ($request->jenis_kelamin === 'L') {
                $query->lakiLaki();
            } elseif ($request->jenis_kelamin === 'P') {
                $query->perempuan();
            }
        }

        // Search
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('nik', 'like', '%' . $request->search . '%')
                  ->orWhere('alamat', 'like', '%' . $request->search . '%');
            });
        }

        $bltDds = $query->orderBy('tahun_anggaran', 'desc')
                       ->orderBy('nama')
                       ->paginate(20);

        // Stats untuk dashboard
        $stats = [
            'total' => BltDd::count(),
            'total_bantuan' => BltDd::sum('nominal_bantuan'),
            'laki_laki' => BltDd::lakiLaki()->count(),
            'perempuan' => BltDd::perempuan()->count(),
            'tahun_aktif' => BltDd::distinct()->pluck('tahun_anggaran')->sortDesc()->first() ?? date('Y')
        ];

        return view('admin.blt-dd.index', compact('bltDds', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blt-dd.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun_anggaran' => 'required|integer|min:2020|max:2030',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'nik' => 'required|string|size:16|unique:blt_dds,nik',
            'alamat' => 'required|string',
            'no_rekening' => 'nullable|string|max:50',
            'nominal_bantuan' => 'nullable|numeric|min:0'
        ]);

        try {
            BltDd::create($validated);

            return redirect()->route('admin.blt-dd.index')
                           ->with('success', 'Data Penerima BLT-DD berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Gagal menambahkan data Penerima BLT-DD: ' . $e->getMessage())
                           ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BltDd $bltDd)
    {
        return view('admin.blt-dd.show', compact('bltDd'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BltDd $bltDd)
    {
        return view('admin.blt-dd.edit', compact('bltDd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BltDd $bltDd)
    {
        $validated = $request->validate([
            'tahun_anggaran' => 'required|integer|min:2020|max:2030',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'nik' => 'required|string|size:16|unique:blt_dds,nik,' . $bltDd->id,
            'alamat' => 'required|string',
            'no_rekening' => 'nullable|string|max:50',
            'nominal_bantuan' => 'nullable|numeric|min:0'
        ]);

        try {
            $bltDd->update($validated);

            return redirect()->route('admin.blt-dd.index')
                           ->with('success', 'Data Penerima BLT-DD berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Gagal memperbarui data Penerima BLT-DD: ' . $e->getMessage())
                           ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BltDd $bltDd)
    {
        try {
            $bltDd->delete();

            return redirect()->route('admin.blt-dd.index')
                           ->with('success', 'Data Penerima BLT-DD berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Gagal menghapus data Penerima BLT-DD: ' . $e->getMessage());
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
            'items.*.nama' => 'required|string|max:255',
            'items.*.jenis_kelamin' => 'required|in:L,P',
            'items.*.nik' => 'required|string|size:16',
            'items.*.alamat' => 'required|string',
            'items.*.no_rekening' => 'nullable|string|max:50',
            'items.*.nominal_bantuan' => 'nullable|numeric|min:0'
        ]);

        try {
            DB::beginTransaction();

            foreach ($request->items as $item) {
                // Check for duplicate NIK
                if (BltDd::where('nik', $item['nik'])->exists()) {
                    continue; // Skip duplicate NIK
                }
                BltDd::create($item);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data Penerima BLT-DD berhasil diimpor sebanyak ' . count($request->items) . ' item'
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
