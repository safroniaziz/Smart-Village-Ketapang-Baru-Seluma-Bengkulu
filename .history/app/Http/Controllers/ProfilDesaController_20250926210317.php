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

class ProfilDesaController extends Controller
{
    public function index()
    {
        $monografi = MonografiDesa::first();
        $batasWilayah = BatasWilayah::active()->ordered()->get();
        $fasilitas = FasilitasDesa::active()->ordered()->get();
        $iklim = IklimDesa::active()->get();
        $peruntukanLahan = PeruntukanLahan::active()->ordered()->get();
        $potensiDesa = PotensiDesa::ordered()->get();

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
            'suhu_rata_rata' => 'nullable|numeric|min:0|max:50',
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
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:500',
            'kondisi' => 'nullable|string|max:100',
            'tahun_dibangun' => 'nullable|integer|min:1900|max:' . date('Y'),
            'luas_bangunan' => 'nullable|numeric|min:0',
            'luas_tanah' => 'nullable|numeric|min:0',
            'status_kepemilikan' => 'nullable|string|max:100',
            'kapasitas' => 'nullable|integer|min:0',
            'pengelola' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fasilitas = new FasilitasDesa();
        $fasilitas->fill($request->all());
        $fasilitas->is_active = true;
        $fasilitas->urutan = FasilitasDesa::max('urutan') + 1;
        $fasilitas->save();

        // Handle foto upload
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '_' . $fasilitas->id . '.' . $foto->getClientOriginalExtension();
            $path = $foto->storeAs('public/fasilitas', $filename);
            $fasilitas->update(['foto' => 'fasilitas/' . $filename]);
        }

        return response()->json(['success' => 'Fasilitas berhasil ditambahkan!']);
    }

    public function updateFasilitas(Request $request, $id)
    {
        $fasilitas = FasilitasDesa::findOrFail($id);

        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:500',
            'kondisi' => 'nullable|string|max:100',
            'tahun_dibangun' => 'nullable|integer|min:1900|max:' . date('Y'),
            'luas_bangunan' => 'nullable|numeric|min:0',
            'luas_tanah' => 'nullable|numeric|min:0',
            'status_kepemilikan' => 'nullable|string|max:100',
            'kapasitas' => 'nullable|integer|min:0',
            'pengelola' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fasilitas->update($request->all());

        // Handle foto upload
        if ($request->hasFile('foto')) {
            // Delete old foto
            if ($fasilitas->foto && Storage::exists('public/' . $fasilitas->foto)) {
                Storage::delete('public/' . $fasilitas->foto);
            }

            $foto = $request->file('foto');
            $filename = time() . '_' . $fasilitas->id . '.' . $foto->getClientOriginalExtension();
            $path = $foto->storeAs('public/fasilitas', $filename);
            $fasilitas->update(['foto' => 'fasilitas/' . $filename]);
        }

        return response()->json(['success' => 'Fasilitas berhasil diperbarui!']);
    }

    public function destroyFasilitas($id)
    {
        $fasilitas = FasilitasDesa::findOrFail($id);

        // Delete foto if exists
        if ($fasilitas->foto && Storage::exists('public/' . $fasilitas->foto)) {
            Storage::delete('public/' . $fasilitas->foto);
        }

        $fasilitas->delete();

        return response()->json(['success' => 'Fasilitas berhasil dihapus!']);
    }
}
