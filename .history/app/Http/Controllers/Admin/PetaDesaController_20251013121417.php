<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LahanPoint;
use App\Models\BatasWilayah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
// Removed DataTables dependency

class PetaDesaController extends Controller
{
    public function index()
    {
        return view('admin.peta-desa.index');
    }

    // === LAHAN POINT MANAGEMENT ===

    public function lahanIndex()
    {
        return view('admin.peta-desa.lahan.index');
    }

    public function lahanData()
    {
        $lahan = LahanPoint::orderBy('created_at', 'desc')->paginate(10);
        return response()->json([
            'data' => $lahan->items(),
            'total' => $lahan->total(),
            'per_page' => $lahan->perPage(),
            'current_page' => $lahan->currentPage(),
            'last_page' => $lahan->lastPage()
        ]);
    }

    public function lahanStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string|max:16',
            'nama_lengkap' => 'required|string|max:255',
            'lat' => 'required|numeric|between:-90,90',
            'long' => 'required|numeric|between:-180,180',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'nik.required' => 'NIK harus diisi',
            'nama_lengkap.required' => 'Nama lengkap harus diisi',
            'lat.required' => 'Latitude harus diisi',
            'long.required' => 'Longitude harus diisi',
            'lat.between' => 'Latitude harus antara -90 sampai 90',
            'long.between' => 'Longitude harus antara -180 sampai 180',
            'foto.image' => 'File harus berupa gambar',
            'foto.max' => 'Ukuran foto maksimal 2MB'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->only(['nik', 'nama_lengkap', 'lat', 'long']);

        // Handle file upload
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('lahan-photos', $filename, 'public');
            $data['foto_path'] = 'storage/' . $path;
        }

        $lahan = LahanPoint::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data lahan berhasil ditambahkan',
            'data' => $lahan
        ]);
    }

    public function lahanShow($id)
    {
        $lahan = LahanPoint::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $lahan
        ]);
    }

    public function lahanUpdate(Request $request, $id)
    {
        $lahan = LahanPoint::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nik' => 'required|string|max:16',
            'nama_lengkap' => 'required|string|max:255',
            'lat' => 'required|numeric|between:-90,90',
            'long' => 'required|numeric|between:-180,180',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'nik.required' => 'NIK harus diisi',
            'nama_lengkap.required' => 'Nama lengkap harus diisi',
            'lat.required' => 'Latitude harus diisi',
            'long.required' => 'Longitude harus diisi',
            'lat.between' => 'Latitude harus antara -90 sampai 90',
            'long.between' => 'Longitude harus antara -180 sampai 180',
            'foto.image' => 'File harus berupa gambar',
            'foto.max' => 'Ukuran foto maksimal 2MB'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->only(['nik', 'nama_lengkap', 'lat', 'long']);

        // Handle file upload
        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($lahan->foto_path && Storage::disk('public')->exists(str_replace('storage/', '', $lahan->foto_path))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $lahan->foto_path));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('lahan-photos', $filename, 'public');
            $data['foto_path'] = 'storage/' . $path;
        }

        $lahan->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Data lahan berhasil diupdate',
            'data' => $lahan
        ]);
    }

    public function lahanDestroy($id)
    {
        $lahan = LahanPoint::findOrFail($id);

        // Delete photo if exists
        if ($lahan->foto_path && Storage::disk('public')->exists(str_replace('storage/', '', $lahan->foto_path))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $lahan->foto_path));
        }

        $lahan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data lahan berhasil dihapus'
        ]);
    }

    // === BATAS WILAYAH MANAGEMENT ===

    public function batasWilayahIndex()
    {
        return view('admin.peta-desa.batas-wilayah.index');
    }

    public function batasWilayahData()
    {
        $batasWilayah = BatasWilayah::ordered()->paginate(10);
        return response()->json([
            'data' => $batasWilayah->items(),
            'total' => $batasWilayah->total(),
            'per_page' => $batasWilayah->perPage(),
            'current_page' => $batasWilayah->currentPage(),
            'last_page' => $batasWilayah->lastPage()
        ]);
    }

    public function batasWilayahStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'arah' => 'required|in:utara,selatan,barat,timur',
            'berbatasan_dengan' => 'required|string|max:255',
            'jenis_wilayah' => 'required|string|max:100',
            'jarak_km' => 'required|numeric|min:0',
            'landmark' => 'nullable|string|max:255',
            'koordinat' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
            'is_active' => 'boolean'
        ], [
            'arah.required' => 'Arah harus dipilih',
            'berbatasan_dengan.required' => 'Berbatasan dengan harus diisi',
            'jenis_wilayah.required' => 'Jenis wilayah harus diisi',
            'jarak_km.required' => 'Jarak harus diisi',
            'jarak_km.min' => 'Jarak tidak boleh negatif'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $batasWilayah = BatasWilayah::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data batas wilayah berhasil ditambahkan',
            'data' => $batasWilayah
        ]);
    }

    public function batasWilayahShow($id)
    {
        $batasWilayah = BatasWilayah::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $batasWilayah
        ]);
    }

    public function batasWilayahUpdate(Request $request, $id)
    {
        $batasWilayah = BatasWilayah::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'arah' => 'required|in:utara,selatan,barat,timur',
            'berbatasan_dengan' => 'required|string|max:255',
            'jenis_wilayah' => 'required|string|max:100',
            'jarak_km' => 'required|numeric|min:0',
            'landmark' => 'nullable|string|max:255',
            'koordinat' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
            'is_active' => 'boolean'
        ], [
            'arah.required' => 'Arah harus dipilih',
            'berbatasan_dengan.required' => 'Berbatasan dengan harus diisi',
            'jenis_wilayah.required' => 'Jenis wilayah harus diisi',
            'jarak_km.required' => 'Jarak harus diisi',
            'jarak_km.min' => 'Jarak tidak boleh negatif'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $batasWilayah->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Data batas wilayah berhasil diupdate',
            'data' => $batasWilayah
        ]);
    }

    public function batasWilayahDestroy($id)
    {
        $batasWilayah = BatasWilayah::findOrFail($id);
        $batasWilayah->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data batas wilayah berhasil dihapus'
        ]);
    }

    // === WARGA COORDINATES MANAGEMENT ===

    public function wargaIndex()
    {
        return view('admin.peta-desa.warga.index');
    }

    public function wargaData()
    {
        $query = User::whereNotNull('lat')
            ->whereNotNull('long')
            ->where('lat', '!=', '')
            ->where('long', '!=', '')
            ->where('is_kepala_keluarga', true);

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('koordinat', function($row) {
                return $row->lat . ', ' . $row->long;
            })
            ->addColumn('foto', function($row) {
                if ($row->foto) {
                    $photoUrl = asset('storage/' . $row->foto);
                    return '<img src="' . $photoUrl . '" alt="Foto Warga" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">';
                }
                return '<span class="text-muted">Tidak ada foto</span>';
            })
            ->addColumn('action', function($row) {
                $btn = '<div class="btn-group" role="group">';
                $btn .= '<button type="button" class="btn btn-info btn-sm" onclick="showWarga(' . $row->id . ')" title="Lihat Detail">
                            <i class="fas fa-eye"></i>
                        </button>';
                $btn .= '<button type="button" class="btn btn-warning btn-sm" onclick="editWarga(' . $row->id . ')" title="Edit Koordinat">
                            <i class="fas fa-edit"></i>
                        </button>';
                $btn .= '</div>';
                return $btn;
            })
            ->rawColumns(['foto', 'action'])
            ->make(true);
    }

    public function wargaShow($id)
    {
        $warga = User::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $warga
        ]);
    }

    public function wargaUpdate(Request $request, $id)
    {
        $warga = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'lat' => 'required|numeric|between:-90,90',
            'long' => 'required|numeric|between:-180,180',
        ], [
            'lat.required' => 'Latitude wajib diisi',
            'lat.numeric' => 'Latitude harus berupa angka',
            'lat.between' => 'Latitude harus antara -90 sampai 90',
            'long.required' => 'Longitude wajib diisi',
            'long.numeric' => 'Longitude harus berupa angka',
            'long.between' => 'Longitude harus antara -180 sampai 180',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $warga->update([
            'lat' => $request->lat,
            'long' => $request->long,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Koordinat warga berhasil diupdate',
            'data' => $warga
        ]);
    }
}
