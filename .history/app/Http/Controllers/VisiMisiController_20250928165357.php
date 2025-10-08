<?php

namespace App\Http\Controllers;

use App\Models\VisiDesa;
use App\Models\MisiDesa;
use App\Models\PendekatanDesa;
use App\Models\TahapanDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VisiMisiController extends Controller
{
    /**
     * Display the main admin page for visi misi management
     */
    public function index()
    {
        return view('admin.visi-misi.index');
    }

    // VISI DESA
    public function indexVisi()
    {
        $visi = VisiDesa::ordered()->get();
        return view('admin.visi-misi.partials.visi-table-content', compact('visi'));
    }

    public function getVisiData()
    {
        $visi = VisiDesa::first();
        return response()->json($visi);
    }

    public function storeVisi(Request $request)
    {
        $request->validate([
            'visi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'deskripsi_section' => 'nullable|string',
            'pendekatan_deskripsi' => 'nullable|string',
        ]);

        $data = $request->all();

        VisiDesa::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Visi berhasil ditambahkan'
        ]);
    }

    public function updateVisi(Request $request, $id)
    {
        $request->validate([
            'visi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'deskripsi_section' => 'nullable|string',
            'pendekatan_deskripsi' => 'nullable|string',
        ]);

        $visi = VisiDesa::findOrFail($id);
        $data = $request->all();
        $visi->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Visi berhasil diperbarui'
        ]);
    }

    public function editVisi($id)
    {
        $visi = VisiDesa::findOrFail($id);
        return response()->json($visi);
    }

    public function destroyVisi($id)
    {
        $visi = VisiDesa::findOrFail($id);
        $visi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Visi berhasil dihapus'
        ]);
    }

    // MISI DESA
    public function indexMisi()
    {
        $misi = MisiDesa::ordered()->get();
        return view('admin.visi-misi.partials.misi-table-content', compact('misi'));
    }

    public function storeMisi(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'indikator' => 'nullable|string',
        ]);

        $data = $request->all();

        MisiDesa::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Misi berhasil ditambahkan'
        ]);
    }

    public function updateMisi(Request $request, $id)
    {
        // Debug: Log request data
        Log::info('Update Misi Request Data:', $request->all());

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'indikator' => 'nullable|string'
        ]);

        $misi = MisiDesa::findOrFail($id);
        $data = $request->all();
        $misi->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Misi berhasil diperbarui'
        ]);
    }

    public function editMisi($id)
    {
        $misi = MisiDesa::findOrFail($id);
        return response()->json($misi);
    }

    public function destroyMisi($id)
    {
        $misi = MisiDesa::findOrFail($id);
        $misi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Misi berhasil dihapus'
        ]);
    }

    // PENDEKATAN DESA
    public function indexPendekatan()
    {
        $pendekatan = PendekatanDesa::ordered()->get();
        return view('admin.visi-misi.partials.pendekatan-table-content', compact('pendekatan'));
    }

    public function storePendekatan(Request $request)
    {
        $request->validate([
            'nama_pendekatan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'strategi' => 'nullable|string',
        ]);

        $data = $request->all();

        PendekatanDesa::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Pendekatan berhasil ditambahkan'
        ]);
    }

    public function updatePendekatan(Request $request, $id)
    {
        $request->validate([
            'nama_pendekatan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'strategi' => 'nullable|string',
        ]);

        $pendekatan = PendekatanDesa::findOrFail($id);
        $data = $request->all();
        $pendekatan->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Pendekatan berhasil diperbarui'
        ]);
    }

    public function editPendekatan($id)
    {
        $pendekatan = PendekatanDesa::findOrFail($id);
        return response()->json($pendekatan);
    }

    public function destroyPendekatan($id)
    {
        $pendekatan = PendekatanDesa::findOrFail($id);
        $pendekatan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pendekatan berhasil dihapus'
        ]);
    }

    // TAHAPAN DESA
    public function indexTahapan()
    {
        $tahapan = TahapanDesa::ordered()->get();
        return view('admin.visi-misi.partials.tahapan-table-content', compact('tahapan'));
    }

    public function storeTahapan(Request $request)
    {
        $request->validate([
            'nama_tahapan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kegiatan' => 'nullable|string',
            'waktu' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        TahapanDesa::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Tahapan berhasil ditambahkan'
        ]);
    }

    public function updateTahapan(Request $request, $id)
    {
        $request->validate([
            'nama_tahapan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kegiatan' => 'nullable|string',
            'waktu' => 'nullable|string|max:255',
        ]);

        $tahapan = TahapanDesa::findOrFail($id);
        $data = $request->all();
        $tahapan->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Tahapan berhasil diperbarui'
        ]);
    }

    public function editTahapan($id)
    {
        $tahapan = TahapanDesa::findOrFail($id);
        return response()->json($tahapan);
    }

    public function destroyTahapan($id)
    {
        $tahapan = TahapanDesa::findOrFail($id);
        $tahapan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tahapan berhasil dihapus'
        ]);
    }
}
