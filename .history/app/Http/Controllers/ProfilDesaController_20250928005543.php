<?php

namespace App\Http\Controllers;

use App\Models\MonografiDesa;
use App\Models\BatasWilayah;
use App\Models\FasilitasDesa;
use App\Models\IklimDesa;
use App\Models\PeruntukanLahan;
use App\Models\PotensiDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProfilDesaController extends Controller
{
    public function index(Request $request)
    {
        $monografi = MonografiDesa::first();
        $batasWilayah = BatasWilayah::ordered()->get();
        $fasilitas = FasilitasDesa::ordered()->get();
        $iklim = IklimDesa::get();
        $peruntukanLahan = PeruntukanLahan::ordered()->get();
        $potensiDesa = PotensiDesa::ordered()->get();

        // If it's an AJAX request, return JSON data
        if ($request->ajax()) {
            return response()->json([
                'monografi' => $monografi,
                'batasWilayah' => $batasWilayah,
                'fasilitas' => $fasilitas,
                'iklim' => $iklim,
                'peruntukanLahan' => $peruntukanLahan,
                'potensiDesa' => $potensiDesa
            ]);
        }

        return view('admin.profil-desa.index', compact(
            'monografi',
            'batasWilayah',
            'fasilitas',
            'iklim',
            'peruntukanLahan',
            'potensiDesa'
        ));
    }

    public function update(Request $request)
    {
        $request->validate([
            // Monografi Desa
            'nama_desa' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'nullable|string|max:10',
            'kode_area' => 'nullable|string|max:10',
            'status_desa' => 'required|in:Desa Berkembang,Desa Maju,Desa Mandiri,Desa Tertinggal,Kelurahan',
            'tahun_berdiri' => 'nullable|integer|min:1800|max:' . date('Y'),
            'luas_wilayah' => 'required|numeric|min:0',
            'ketinggian_mdpl' => 'nullable|integer|min:0',
            'topografi' => 'nullable|string|max:255',
            'iklim' => 'nullable|string|max:255',
            'suhu_rata_rata' => 'nullable|string|max:255',
            'jarak_ke_kecamatan' => 'nullable|numeric|min:0',
            'waktu_ke_kecamatan' => 'nullable|numeric|min:0',
            'jarak_ke_kabupaten' => 'nullable|numeric|min:0',
            'waktu_ke_kabupaten' => 'nullable|numeric|min:0',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'google_street_view_url' => 'nullable|url|max:500',
            'deskripsi' => 'nullable|string',

            // Batas Wilayah
            'batas_utara' => 'nullable|string|max:255',
            'batas_timur' => 'nullable|string|max:255',
            'batas_selatan' => 'nullable|string|max:255',
            'batas_barat' => 'nullable|string|max:255',

            // Fasilitas Desa
            'fasilitas.*.nama_fasilitas' => 'nullable|string|max:255',
            'fasilitas.*.kategori' => 'nullable|string|max:100',
            'fasilitas.*.deskripsi' => 'nullable|string',
            'fasilitas.*.alamat' => 'nullable|string|max:500',
            'fasilitas.*.kondisi' => 'nullable|string|max:100',
            'fasilitas.*.tahun_dibangun' => 'nullable|integer|min:1800|max:' . date('Y'),
            'fasilitas.*.luas_bangunan' => 'nullable|numeric|min:0',
            'fasilitas.*.luas_tanah' => 'nullable|numeric|min:0',
            'fasilitas.*.status_kepemilikan' => 'nullable|string|max:100',
            'fasilitas.*.kapasitas' => 'nullable|integer|min:0',
            'fasilitas.*.pengelola' => 'nullable|string|max:255',
            'fasilitas.*.foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            // Iklim Desa
            'curah_hujan' => 'nullable|numeric|min:0',
            'kelembaban' => 'nullable|numeric|min:0|max:100',
            'kecepatan_angin' => 'nullable|numeric|min:0',
            'arah_angin' => 'nullable|string|max:100',
            'musim_hujan' => 'nullable|string|max:255',
            'musim_kemarau' => 'nullable|string|max:255',

            // Peruntukan Lahan
            'lahan_perumahan' => 'nullable|numeric|min:0',
            'lahan_pertanian' => 'nullable|numeric|min:0',
            'lahan_perkebunan' => 'nullable|numeric|min:0',
            'lahan_hutan' => 'nullable|numeric|min:0',
            'lahan_tambang' => 'nullable|numeric|min:0',
            'lahan_lainnya' => 'nullable|numeric|min:0',

            // Potensi Desa
            'potensi_alam' => 'nullable|string',
            'potensi_sumber_daya' => 'nullable|string',
            'potensi_ekonomi' => 'nullable|string',
            'potensi_wisata' => 'nullable|string',
            'potensi_sosial' => 'nullable|string',
            'potensi_budaya' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            // Update Monografi Desa
            $monografi = MonografiDesa::firstOrCreate([]);
            $updateData = $request->only([
                'nama_desa', 'kecamatan', 'kabupaten', 'provinsi', 'kode_pos', 'kode_area',
                'status_desa', 'tahun_berdiri', 'luas_wilayah', 'ketinggian_mdpl',
                'topografi', 'iklim', 'suhu_rata_rata', 'jarak_ke_kecamatan',
                'waktu_ke_kecamatan', 'jarak_ke_kabupaten', 'waktu_ke_kabupaten',
                'latitude', 'longitude', 'google_street_view_url', 'deskripsi'
            ]);

            // Debug: Log the data being updated
            \Log::info('Updating monografi data:', $updateData);

            $monografi->update($updateData);

            // Update Batas Wilayah
            $batasData = [
                'utara' => $request->batas_utara,
                'timur' => $request->batas_timur,
                'selatan' => $request->batas_selatan,
                'barat' => $request->batas_barat,
            ];

            foreach ($batasData as $arah => $berbatasan) {
                if ($berbatasan) {
                    BatasWilayah::updateOrCreate(
                        ['arah' => $arah],
                        [
                            'berbatasan_dengan' => $berbatasan,
                            'is_active' => true
                        ]
                    );
                }
            }

            // Update Fasilitas Desa
            if ($request->has('fasilitas')) {
                foreach ($request->fasilitas as $index => $fasilitasData) {
                    if (!empty($fasilitasData['nama_fasilitas'])) {
                        $fasilitas = FasilitasDesa::updateOrCreate(
                            ['id' => $fasilitasData['id'] ?? null],
                            array_merge($fasilitasData, [
                                'urutan' => $index + 1,
                                'is_active' => true
                            ])
                        );

                        // Handle foto upload
                        if ($request->hasFile("fasilitas.{$index}.foto")) {
                            $foto = $request->file("fasilitas.{$index}.foto");
                            $filename = time() . '_' . $fasilitas->id . '.' . $foto->getClientOriginalExtension();
                            $path = $foto->storeAs('public/fasilitas', $filename);
                            $fasilitas->update(['foto' => 'fasilitas/' . $filename]);
                        }
                    }
                }
            }

            // Update Iklim Desa
            $iklim = IklimDesa::firstOrCreate([]);
            $iklim->update($request->only([
                'curah_hujan', 'kelembaban', 'kecepatan_angin', 'arah_angin',
                'musim_hujan', 'musim_kemarau'
            ]));

            // Update Peruntukan Lahan
            $peruntukanLahan = PeruntukanLahan::firstOrCreate([]);
            $peruntukanLahan->update($request->only([
                'lahan_perumahan', 'lahan_pertanian', 'lahan_perkebunan',
                'lahan_hutan', 'lahan_tambang', 'lahan_lainnya'
            ]));

            // Update Potensi Desa
            $potensiDesa = PotensiDesa::firstOrCreate([]);
            $potensiDesa->update($request->only([
                'potensi_alam', 'potensi_sumber_daya', 'potensi_ekonomi',
                'potensi_wisata', 'potensi_sosial', 'potensi_budaya'
            ]));

            DB::commit();

            return redirect()->route('profil-desa.index')
                ->with('success', 'Profil desa berhasil diperbarui!');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function showFasilitas($id)
    {
        $fasilitas = FasilitasDesa::findOrFail($id);
        return response()->json($fasilitas);
    }

    public function storeFasilitas(Request $request)
    {
        \Log::info('=== StoreFasilitas method called ===');
        Log::info('Request data:', $request->all());

        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string|max:500',
            'kondisi' => 'required|string|in:Baik,Rusak Ringan,Rusak Berat,Tidak Layak',
            'tahun_dibangun' => 'nullable|integer|min:1900|max:' . date('Y'),
            'luas_bangunan' => 'nullable|numeric|min:0',
            'luas_tanah' => 'nullable|numeric|min:0',
            'status_kepemilikan' => 'nullable|string|in:milik_desa,pemerintah,swasta,hibah',
            'fasilitas_yang_tersedia' => 'nullable|string',
            'kapasitas' => 'nullable|integer|min:0',
            'pengelola' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'koordinat' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'urutan' => 'nullable|integer|min:0',
        ]);

        $fasilitas = new FasilitasDesa();
        $fasilitas->fill($request->all());
        $fasilitas->is_active = true;
        $fasilitas->urutan = FasilitasDesa::max('urutan') + 1;
        $fasilitas->save();

        // Handle foto upload with debug
        Log::info('Files in request:', $request->files->all());
        Log::info('Has foto file:', [$request->hasFile('foto')]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            Log::info('Photo details:', [
                'name' => $foto->getClientOriginalName(),
                'size' => $foto->getSize(),
                'mime' => $foto->getMimeType()
            ]);

            $filename = time() . '_' . $fasilitas->id . '.' . $foto->getClientOriginalExtension();
            $path = $foto->storeAs('fasilitas', $filename, 'public');

            Log::info('Storage path:', ['path' => $path]);

            $fasilitas->update(['foto' => 'fasilitas/' . $filename]);
            Log::info('Photo saved to database:', ['foto' => 'fasilitas/' . $filename]);
        } else {
            Log::info('No photo file received');
        }

        return response()->json(['success' => 'Fasilitas berhasil ditambahkan!']);
    }

    public function updateFasilitas(Request $request, $id)
    {
        Log::info('=== UpdateFasilitas method called ===');
        Log::info('Request data:', $request->all());

        $fasilitas = FasilitasDesa::findOrFail($id);

        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:500',
            'kondisi' => 'required|string|in:Baik,Rusak Ringan,Rusak Berat,Tidak Layak',
            'tahun_dibangun' => 'nullable|integer|min:1900|max:' . date('Y'),
            'luas_bangunan' => 'nullable|numeric|min:0',
            'luas_tanah' => 'nullable|numeric|min:0',
            'status_kepemilikan' => 'nullable|string|max:100',
            'kapasitas' => 'nullable|integer|min:0',
            'pengelola' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fasilitas->update($request->all());

        // Handle foto upload with debug
        Log::info('Files in request:', $request->files->all());
        Log::info('Has foto file:', [$request->hasFile('foto')]);

        if ($request->hasFile('foto')) {
            Log::info('Photo details:', [
                'name' => $request->file('foto')->getClientOriginalName(),
                'size' => $request->file('foto')->getSize(),
                'mime' => $request->file('foto')->getMimeType()
            ]);

            // Delete old foto
            if ($fasilitas->foto && Storage::disk('public')->exists($fasilitas->foto)) {
                Log::info('Deleting old photo:', ['path' => $fasilitas->foto]);
                Storage::disk('public')->delete($fasilitas->foto);
            }

            $foto = $request->file('foto');
            $filename = time() . '_' . $fasilitas->id . '.' . $foto->getClientOriginalExtension();
            $path = $foto->storeAs('fasilitas', $filename, 'public');

            Log::info('Storage path:', ['path' => $path]);

            $fasilitas->update(['foto' => 'fasilitas/' . $filename]);
            Log::info('Photo saved to database:', ['foto' => 'fasilitas/' . $filename]);
        } else {
            Log::info('No photo file received in update');
        }

        return response()->json(['success' => 'Fasilitas berhasil diperbarui!']);
    }

    public function destroyFasilitas($id)
    {
        $fasilitas = FasilitasDesa::findOrFail($id);

        // Delete foto if exists
        if ($fasilitas->foto && Storage::disk('public')->exists($fasilitas->foto)) {
            Storage::disk('public')->delete($fasilitas->foto);
        }

        $fasilitas->delete();

        return response()->json(['success' => 'Fasilitas berhasil dihapus!']);
    }

    // Iklim Desa Methods
    public function showIklim($id)
    {
        try {
            $iklim = IklimDesa::findOrFail($id);
            return response()->json($iklim);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Data iklim tidak ditemukan'], 404);
        }
    }

    public function storeIklim(Request $request)
    {
        try {
            $validated = $request->validate([
                'jenis_iklim' => 'required|string|max:255',
                'suhu_min' => 'nullable|numeric|min:0|max:50',
                'suhu_max' => 'nullable|numeric|min:0|max:50',
                'kelembaban_rata' => 'nullable|numeric|min:0|max:100',
                'curah_hujan_tahunan' => 'nullable|integer|min:0',
                'hari_hujan_pertahun' => 'nullable|integer|min:0|max:365',
                'musim_kering' => 'nullable|string|max:255',
                'musim_hujan' => 'nullable|string|max:255',
                'angin_dominan' => 'nullable|string|max:255',
                'karakteristik_iklim' => 'nullable|string',
            ]);

            IklimDesa::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Data iklim berhasil ditambahkan'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors with proper 422 status
            return response()->json([
                'message' => 'Data yang dimasukkan tidak valid',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan data iklim: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateIklim(Request $request, $id)
    {
        try {
            // Debug logging
            \Illuminate\Support\Facades\Log::info('Update Iklim Request Data:', $request->all());

            $iklim = IklimDesa::findOrFail($id);

            $validated = $request->validate([
                'jenis_iklim' => 'required|string|max:255',
                'suhu_min' => 'nullable|numeric|min:0|max:50',
                'suhu_max' => 'nullable|numeric|min:0|max:50',
                'kelembaban_rata' => 'nullable|numeric|min:0|max:100',
                'curah_hujan_tahunan' => 'nullable|integer|min:0',
                'hari_hujan_pertahun' => 'nullable|integer|min:0|max:365',
                'musim_kering' => 'nullable|string|max:255',
                'musim_hujan' => 'nullable|string|max:255',
                'angin_dominan' => 'nullable|string|max:255',
                'karakteristik_iklim' => 'nullable|string',
            ]);

            $iklim->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Data iklim berhasil diperbarui'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors with proper 422 status
            return response()->json([
                'message' => 'Data yang dimasukkan tidak valid',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data iklim: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroyIklim($id)
    {
        try {
            $iklim = IklimDesa::findOrFail($id);
            $iklim->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data iklim berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data iklim: ' . $e->getMessage()
            ], 500);
        }
    }

    // Peruntukan Lahan Methods
    public function showPeruntukan($id)
    {
        try {
            $peruntukan = PeruntukanLahan::findOrFail($id);
            return response()->json($peruntukan);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Data peruntukan lahan tidak ditemukan'], 404);
        }
    }

    public function storePeruntukan(Request $request)
    {
        try {
            $validated = $request->validate([
                'kategori_lahan' => 'required|string|max:255',
                'luas' => 'required|numeric|min:0',
                'persentase' => 'nullable|numeric|min:0|max:100',
                'status_kepemilikan' => 'nullable|string|max:255',
                'deskripsi' => 'nullable|string',
            ]);

            PeruntukanLahan::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Data peruntukan lahan berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan data peruntukan lahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updatePeruntukan(Request $request, $id)
    {
        try {
            $peruntukan = PeruntukanLahan::findOrFail($id);

            $validated = $request->validate([
                'kategori_lahan' => 'required|string|max:255',
                'luas' => 'required|numeric|min:0',
                'persentase' => 'nullable|numeric|min:0|max:100',
                'status_kepemilikan' => 'nullable|string|max:255',
                'deskripsi' => 'nullable|string',
            ]);

            $peruntukan->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Data peruntukan lahan berhasil diperbarui'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data peruntukan lahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroyPeruntukan($id)
    {
        try {
            $peruntukan = PeruntukanLahan::findOrFail($id);
            $peruntukan->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data peruntukan lahan berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data peruntukan lahan: ' . $e->getMessage()
            ], 500);
        }
    }

    // Potensi Desa Methods
    public function showPotensi($id)
    {
        try {
            $potensi = PotensiDesa::findOrFail($id);
            return response()->json($potensi);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Data potensi desa tidak ditemukan'], 404);
        }
    }

    public function storePotensi(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_potensi' => 'required|string|max:255',
                'kategori' => 'required|string|max:255',
                'lokasi' => 'nullable|string|max:255',
                'nilai_ekonomi' => 'nullable|numeric|min:0',
                'jumlah_unit' => 'nullable|integer|min:0',
                'satuan' => 'nullable|string|max:255',
                'pengelola' => 'nullable|string|max:255',
                'status' => 'nullable|string|in:aktif,berkembang,menurun,tidak_aktif',
                'icon' => 'nullable|string|max:255',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'deskripsi' => 'nullable|string',
                'peluang_pengembangan' => 'nullable|string',
                'kendala' => 'nullable|string',
                'is_unggulan' => 'boolean',
            ]);

            // Set urutan otomatis (nomor terakhir + 1)
            $lastUrutan = PotensiDesa::max('urutan') ?? 0;
            $validated['urutan'] = $lastUrutan + 1;

            // Handle foto upload
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $filename = time() . '_' . $foto->getClientOriginalName();
                $path = $foto->storeAs('public/potensi_desa', $filename);
                $validated['foto'] = 'potensi_desa/' . $filename;
            }

            PotensiDesa::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Data potensi desa berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan data potensi desa: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updatePotensi(Request $request, $id)
    {
        try {
            $potensi = PotensiDesa::findOrFail($id);

            $validated = $request->validate([
                'nama_potensi' => 'required|string|max:255',
                'kategori' => 'required|string|max:255',
                'lokasi' => 'nullable|string|max:255',
                'nilai_ekonomi' => 'nullable|numeric|min:0',
                'jumlah_unit' => 'nullable|integer|min:0',
                'satuan' => 'nullable|string|max:255',
                'pengelola' => 'nullable|string|max:255',
                'status' => 'nullable|string|in:aktif,berkembang,menurun,tidak_aktif',
                'icon' => 'nullable|string|max:255',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'deskripsi' => 'nullable|string',
                'peluang_pengembangan' => 'nullable|string',
                'kendala' => 'nullable|string',
                'is_unggulan' => 'boolean',
            ]);

            // Handle foto upload
            if ($request->hasFile('foto')) {
                // Delete old foto if exists
                if ($potensi->foto && Storage::exists('public/' . $potensi->foto)) {
                    Storage::delete('public/' . $potensi->foto);
                }

                $foto = $request->file('foto');
                $filename = time() . '_' . $foto->getClientOriginalName();
                $path = $foto->storeAs('public/potensi_desa', $filename);
                $validated['foto'] = 'potensi_desa/' . $filename;
            }

            $potensi->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Data potensi desa berhasil diperbarui'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data potensi desa: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroyPotensi($id)
    {
        try {
            $potensi = PotensiDesa::findOrFail($id);
            $potensi->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data potensi desa berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data potensi desa: ' . $e->getMessage()
            ], 500);
        }
    }

    // Batas Wilayah Methods
    public function getBatas()
    {
        try {
            $batas = BatasWilayah::all();
            return response()->json($batas);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Data batas wilayah tidak ditemukan'], 404);
        }
    }

    public function storeBatas(Request $request)
    {
        try {
            $validated = $request->validate([
                'arah' => 'required|string|in:utara,timur,selatan,barat',
                'berbatasan_dengan' => 'required|string|max:255',
                'jenis_wilayah' => 'nullable|string|max:100',
                'jarak_km' => 'nullable|numeric|min:0',
                'landmark' => 'nullable|string',
                'koordinat' => 'nullable|string|max:255',
                'keterangan' => 'nullable|string',
            ]);

            // Set default is_active to true
            $validated['is_active'] = true;

            // Create new record
            BatasWilayah::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Data batas wilayah berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan data batas wilayah: ' . $e->getMessage()
            ], 500);
        }
    }

    public function showBatas($id)
    {
        try {
            $batas = BatasWilayah::findOrFail($id);
            return response()->json($batas);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Data batas wilayah tidak ditemukan'], 404);
        }
    }

    public function updateBatas(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'arah' => 'required|string|in:utara,timur,selatan,barat',
                'berbatasan_dengan' => 'required|string|max:255',
                'jenis_wilayah' => 'nullable|string|max:100',
                'jarak_km' => 'nullable|numeric|min:0',
                'landmark' => 'nullable|string|max:255',
                'koordinat' => 'nullable|string|max:255',
                'keterangan' => 'nullable|string',
            ]);

            $batas = BatasWilayah::findOrFail($id);
            $batas->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Data batas wilayah berhasil diperbarui'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data batas wilayah: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroyBatas($id)
    {
        try {
            $batas = BatasWilayah::findOrFail($id);
            $batas->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data batas wilayah berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data batas wilayah: ' . $e->getMessage()
            ], 500);
        }
    }

    // Iklim Bulk Methods
    public function storeIklimBulk(Request $request)
    {
        try {
            $months = [
                'januari', 'februari', 'maret', 'april', 'mei', 'juni',
                'juli', 'agustus', 'september', 'oktober', 'november', 'desember'
            ];

            foreach ($months as $month) {
                $curahHujan = $request->input($month . '_curah_hujan');
                $suhu = $request->input($month . '_suhu');
                $kelembaban = $request->input($month . '_kelembaban');

                if ($curahHujan || $suhu || $kelembaban) {
                    // Check if data exists for this month
                    $existing = IklimDesa::where('bulan', ucfirst($month))->first();

                    $data = [
                        'bulan' => ucfirst($month),
                        'tahun' => date('Y'),
                        'curah_hujan' => $curahHujan,
                        'suhu_rata_rata' => $suhu,
                        'kelembaban' => $kelembaban,
                    ];

                    if ($existing) {
                        $existing->update($data);
                    } else {
                        IklimDesa::create($data);
                    }
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Data iklim berhasil disimpan'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan data iklim: ' . $e->getMessage()
            ], 500);
        }
    }
}
