<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StrukturOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $strukturOrganisasi = StrukturOrganisasi::with(['parent', 'children'])
            ->orderBy('kategori')
            ->orderBy('urutan')
            ->paginate(15);

        $totalStruktur = StrukturOrganisasi::count();
        $totalPemerintahan = StrukturOrganisasi::where('kategori', 'pemerintahan')->count();
        $totalBpd = StrukturOrganisasi::where('kategori', 'bpd')->count();
        $totalAktif = StrukturOrganisasi::where('aktif', true)->count();

        return view('admin.struktur-organisasi.index', compact(
            'strukturOrganisasi',
            'totalStruktur',
            'totalPemerintahan', 
            'totalBpd',
            'totalAktif'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentOptions = StrukturOrganisasi::whereNull('parent_id')
            ->orWhereIn('level', ['kepala', 'sekretaris'])
            ->orderBy('kategori')
            ->orderBy('urutan')
            ->get();

        return view('admin.struktur-organisasi.create', compact('parentOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tugas' => 'nullable|array',
            'tugas.*' => 'string|max:500',
            'wewenang' => 'nullable|array',
            'wewenang.*' => 'string|max:500',
            'parent_id' => 'nullable|exists:struktur_organisasi,id',
            'kategori' => 'required|in:pemerintahan,bpd',
            'level' => 'required|in:kepala,wakil,sekretaris,kasi_kaur,kadus,anggota',
            'aktif' => 'boolean',
        ]);

        $data = $request->only([
            'nama', 'jabatan', 'parent_id', 'kategori', 'level'
        ]);

        // Handle foto upload
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = Str::slug($request->nama) . '_' . time() . '.' . $foto->getClientOriginalExtension();
            $data['foto'] = $foto->storeAs('struktur', $filename, 'public');
        }

        // Handle tugas and wewenang arrays
        $data['tugas'] = $request->tugas ? array_filter($request->tugas) : [];
        $data['wewenang'] = $request->wewenang ? array_filter($request->wewenang) : [];
        $data['aktif'] = $request->has('aktif');

        StrukturOrganisasi::create($data);

        return redirect()->route('admin.struktur-organisasi.index')
            ->with('success', 'Struktur organisasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StrukturOrganisasi $strukturOrganisasi)
    {
        $strukturOrganisasi->load(['parent', 'children']);
        
        return view('admin.struktur-organisasi.show', compact('strukturOrganisasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StrukturOrganisasi $strukturOrganisasi)
    {
        $parentOptions = StrukturOrganisasi::where('id', '!=', $strukturOrganisasi->id)
            ->where(function($query) use ($strukturOrganisasi) {
                $query->whereNull('parent_id')
                    ->orWhereIn('level', ['kepala', 'sekretaris']);
                
                // Don't allow setting parent to own children
                $childrenIds = $strukturOrganisasi->getAllChildren()->pluck('id')->toArray();
                if (!empty($childrenIds)) {
                    $query->whereNotIn('id', $childrenIds);
                }
            })
            ->orderBy('kategori')
            ->orderBy('urutan')
            ->get();

        return view('admin.struktur-organisasi.edit', compact('strukturOrganisasi', 'parentOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StrukturOrganisasi $strukturOrganisasi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tugas' => 'nullable|array',
            'tugas.*' => 'string|max:500',
            'wewenang' => 'nullable|array',
            'wewenang.*' => 'string|max:500',
            'parent_id' => 'nullable|exists:struktur_organisasi,id',
            'kategori' => 'required|in:pemerintahan,bpd',
            'level' => 'required|in:kepala,wakil,sekretaris,kasi_kaur,kadus,anggota',
            'aktif' => 'boolean',
        ]);

        $data = $request->only([
            'nama', 'jabatan', 'parent_id', 'kategori', 'level'
        ]);

        // Handle foto upload
        if ($request->hasFile('foto')) {
            // Delete old foto
            if ($strukturOrganisasi->foto && Storage::disk('public')->exists($strukturOrganisasi->foto)) {
                Storage::disk('public')->delete($strukturOrganisasi->foto);
            }

            $foto = $request->file('foto');
            $filename = Str::slug($request->nama) . '_' . time() . '.' . $foto->getClientOriginalExtension();
            $data['foto'] = $foto->storeAs('struktur', $filename, 'public');
        }

        // Handle tugas and wewenang arrays
        $data['tugas'] = $request->tugas ? array_filter($request->tugas) : [];
        $data['wewenang'] = $request->wewenang ? array_filter($request->wewenang) : [];
        $data['aktif'] = $request->has('aktif');

        $strukturOrganisasi->update($data);

        return redirect()->route('admin.struktur-organisasi.index')
            ->with('success', 'Struktur organisasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage (Soft Delete).
     */
    public function destroy(StrukturOrganisasi $strukturOrganisasi)
    {
        // Check if has active children
        if ($strukturOrganisasi->children()->where('aktif', true)->count() > 0) {
            return redirect()->back()
                ->with('error', 'Tidak dapat menghapus struktur yang masih memiliki bawahan aktif.');
        }

        $strukturOrganisasi->delete();

        return redirect()->route('admin.struktur-organisasi.index')
            ->with('success', 'Struktur organisasi berhasil dihapus.');
    }

    /**
     * Restore soft deleted resource.
     */
    public function restore($id)
    {
        $strukturOrganisasi = StrukturOrganisasi::withTrashed()->findOrFail($id);
        $strukturOrganisasi->restore();

        return redirect()->route('admin.struktur-organisasi.index')
            ->with('success', 'Struktur organisasi berhasil dipulihkan.');
    }

    /**
     * Force delete resource permanently.
     */
    public function forceDestroy($id)
    {
        $strukturOrganisasi = StrukturOrganisasi::withTrashed()->findOrFail($id);
        
        // Delete foto file
        if ($strukturOrganisasi->foto && Storage::disk('public')->exists($strukturOrganisasi->foto)) {
            Storage::disk('public')->delete($strukturOrganisasi->foto);
        }

        $strukturOrganisasi->forceDelete();

        return redirect()->route('admin.struktur-organisasi.index')
            ->with('success', 'Struktur organisasi berhasil dihapus permanen.');
    }

    /**
     * Update urutan (ordering) via AJAX
     */
    public function updateUrutan(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:struktur_organisasi,id',
            'items.*.urutan' => 'required|integer|min:1',
        ]);

        foreach ($request->items as $item) {
            StrukturOrganisasi::where('id', $item['id'])
                ->update(['urutan' => $item['urutan']]);
        }

        return response()->json(['success' => true, 'message' => 'Urutan berhasil diperbarui.']);
    }

    /**
     * Toggle status aktif via AJAX
     */
    public function toggleStatus(StrukturOrganisasi $strukturOrganisasi)
    {
        $strukturOrganisasi->update(['aktif' => !$strukturOrganisasi->aktif]);

        return response()->json([
            'success' => true,
            'aktif' => $strukturOrganisasi->aktif,
            'message' => 'Status berhasil diperbarui.'
        ]);
    }

    /**
     * Get hierarchy data for frontend (API endpoint)
     */
    public function hierarchy()
    {
        $pemerintahan = StrukturOrganisasi::with('children')
            ->where('kategori', 'pemerintahan')
            ->whereNull('parent_id')
            ->active()
            ->ordered()
            ->get();

        $bpd = StrukturOrganisasi::with('children')
            ->where('kategori', 'bpd')
            ->whereNull('parent_id')
            ->active()
            ->ordered()
            ->get();

        return response()->json([
            'pemerintahan' => $pemerintahan,
            'bpd' => $bpd
        ]);
    }
}
