<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\FonnteService;
use App\Models\User;
use App\Models\PenerimaBantuan;
use App\Models\Pengaduan;
use App\Models\MonografiDesa;
use App\Models\BatasWilayah;
use App\Models\PeruntukanLahan;
use App\Models\PotensiDesa;
use App\Models\IklimDesa;
use App\Models\FasilitasDesa;
use App\Http\Requests\PengaduanRequest;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data real dari database (NIK yang valid, bukan null atau '-')
        $totalWarga = User::where('nik', '!=', '-')->whereNotNull('nik')->count();
        $totalLakiLaki = User::where('nik', '!=', '-')->whereNotNull('nik')->where('jenis_kelamin', 'Laki-laki')->count();
        $totalPerempuan = User::where('nik', '!=', '-')->whereNotNull('nik')->where('jenis_kelamin', 'Perempuan')->count();

        // Data distribusi usia
        $usia0_17 = User::where('nik', '!=', '-')->whereNotNull('nik')
            ->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 0 AND 17')
            ->count();
        $usia18_30 = User::where('nik', '!=', '-')->whereNotNull('nik')
            ->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 18 AND 30')
            ->count();
        $usia31_45 = User::where('nik', '!=', '-')->whereNotNull('nik')
            ->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 31 AND 45')
            ->count();
        $usia46_60 = User::where('nik', '!=', '-')->whereNotNull('nik')
            ->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 46 AND 60')
            ->count();
        $usia60Plus = User::where('nik', '!=', '-')->whereNotNull('nik')
            ->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 60')
            ->count();

        // Data tambahan untuk statistik
        $totalDusun = User::where('nik', '!=', '-')->whereNotNull('nik')->distinct('dusun')->count('dusun');
        $totalKepalaKeluarga = User::where('nik', '!=', '-')->whereNotNull('nik')->where('is_kepala_keluarga', true)->count();

        // Jika tanggal_lahir null, estimasi berdasarkan nik (6 digit pertama setelah kode wilayah)
        if ($usia0_17 + $usia18_30 + $usia31_45 + $usia46_60 + $usia60Plus < $totalWarga) {
            // Fallback: distribusi berdasarkan estimasi jika data lahir tidak lengkap
            $sisaWarga = $totalWarga - ($usia0_17 + $usia18_30 + $usia31_45 + $usia46_60 + $usia60Plus);

            // Distribusi estimasi (berdasarkan data demografis umum)
            $usia0_17 += round($sisaWarga * 0.25);      // 25% anak
            $usia18_30 += round($sisaWarga * 0.30);     // 30% muda
            $usia31_45 += round($sisaWarga * 0.25);     // 25% produktif
            $usia46_60 += round($sisaWarga * 0.15);     // 15% dewasa
            $usia60Plus += round($sisaWarga * 0.05);    // 5% lansia
        }

        $data = [
            'totalWarga' => $totalWarga,
            'totalLakiLaki' => $totalLakiLaki,
            'totalPerempuan' => $totalPerempuan,
            'persentaseLakiLaki' => $totalWarga > 0 ? round(($totalLakiLaki / $totalWarga) * 100, 1) : 0,
            'persentasePerempuan' => $totalWarga > 0 ? round(($totalPerempuan / $totalWarga) * 100, 1) : 0,
            'totalDusun' => $totalDusun,
            'totalKepalaKeluarga' => $totalKepalaKeluarga,
            'usia0_17' => $usia0_17,
            'usia18_30' => $usia18_30,
            'usia31_45' => $usia31_45,
            'usia46_60' => $usia46_60,
            'usia60Plus' => $usia60Plus,
        ];

        return view('home', $data);
    }

    public function tentang()
    {
        // Ambil data real dari database (NIK yang valid, bukan null atau '-')
        $totalWarga = User::where('nik', '!=', '-')->whereNotNull('nik')->count();
        $totalLakiLaki = User::where('nik', '!=', '-')->whereNotNull('nik')->where('jenis_kelamin', 'Laki-laki')->count();
        $totalPerempuan = User::where('nik', '!=', '-')->whereNotNull('nik')->where('jenis_kelamin', 'Perempuan')->count();

        // Data tambahan untuk statistik
        $totalDusun = User::where('nik', '!=', '-')->whereNotNull('nik')->distinct('dusun')->count('dusun');
        $totalKepalaKeluarga = User::where('nik', '!=', '-')->whereNotNull('nik')->where('is_kepala_keluarga', true)->count();

        $data = [
            'totalWarga' => $totalWarga,
            'totalLakiLaki' => $totalLakiLaki,
            'totalPerempuan' => $totalPerempuan,
            'totalDusun' => $totalDusun,
            'totalKepalaKeluarga' => $totalKepalaKeluarga,
        ];

        return view('pages.tentang', $data);
    }

    public function struktur()
    {
        return view('pages.struktur');
    }

    public function visiMisi()
    {
        return view('pages.visi-misi');
    }

    public function kontak()
    {
        return view('pages.kontak');
    }

    public function berita()
    {
        return view('pages.berita');
    }

    public function pengumuman()
    {
        return view('pages.pengumuman');
    }

    public function statistik()
    {
        // Statistik dasar
        $totalWarga = User::whereNotNull('nik')->count();
        $totalKK = User::whereNotNull('nik')->distinct('no_kk')->count();

        // Basic gender stats
        $genderStats = User::whereNotNull('nik')->selectRaw('jenis_kelamin, COUNT(*) as count')
            ->groupBy('jenis_kelamin')
            ->pluck('count', 'jenis_kelamin')
            ->toArray();

        // Enhanced age groups with proper categorization
        $ageStats = User::whereNotNull('nik')->selectRaw('
            CASE
                WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 5 THEN "Balita"
                WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 12 THEN "Anak"
                WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 18 THEN "Remaja"
                WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 60 THEN "Dewasa"
                ELSE "Lansia"
            END as age_group,
            COUNT(*) as count
        ')
            ->groupBy('age_group')
            ->pluck('count', 'age_group')
            ->toArray();

        // Calculate advanced demographic metrics
        $averageAge = User::whereNotNull('nik')->whereNotNull('tanggal_lahir')
            ->selectRaw('AVG(TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE())) as avg_age')
            ->value('avg_age');
        $averageAge = round($averageAge, 1);

        // Dependency ratio calculation
        $dependentPopulation = ($ageStats['Balita'] ?? 0) + ($ageStats['Anak'] ?? 0) + ($ageStats['Lansia'] ?? 0);
        $workingAge = ($ageStats['Remaja'] ?? 0) + ($ageStats['Dewasa'] ?? 0);
        $dependencyRatio = $workingAge > 0 ? round(($dependentPopulation / $workingAge) * 100, 1) : 0;

        // Dusun distribution
        $dusunStats = User::whereNotNull('nik')->selectRaw('dusun, COUNT(*) as count')
            ->groupBy('dusun')
            ->pluck('count', 'dusun')
            ->toArray();
        $totalDusun = count($dusunStats);

        // Population density (assuming 5 km² total area - adjust as needed)
        $totalArea = 5; // km²
        $populationDensity = round($totalWarga / $totalArea);

        // Education stats
        $educationStats = User::whereNotNull('nik')->selectRaw('pendidikan, COUNT(*) as count')
            ->groupBy('pendidikan')
            ->pluck('count', 'pendidikan')
            ->toArray();

        // Calculate education insights
        $higherEducation = ($educationStats['S1'] ?? 0) + ($educationStats['S2'] ?? 0) + ($educationStats['S3'] ?? 0);
        $higherEducationRate = $totalWarga > 0 ? round(($higherEducation / $totalWarga) * 100, 1) : 0;

        $professionStats = User::whereNotNull('nik')->selectRaw('pekerjaan, COUNT(*) as count')
            ->groupBy('pekerjaan')
            ->pluck('count', 'pekerjaan')
            ->toArray();
        $maritalStats = User::whereNotNull('nik')->selectRaw('status_perkawinan, COUNT(*) as count')
            ->groupBy('status_perkawinan')
            ->pluck('count', 'status_perkawinan')
            ->toArray();
        $religionStats = User::whereNotNull('nik')->selectRaw('agama, COUNT(*) as count')
            ->groupBy('agama')
            ->pluck('count', 'agama')
            ->toArray();
        $aidStats = PenerimaBantuan::selectRaw('program, COUNT(*) as count')
            ->groupBy('program')
            ->pluck('count', 'program')
            ->toArray();

        // Calculate aid coverage
        $totalAidRecipients = PenerimaBantuan::distinct('warga_id')->count();
        $aidCoverage = $totalWarga > 0 ? round(($totalAidRecipients / $totalWarga) * 100, 1) : 0;

        $wargas = User::whereNotNull('nik')->paginate(10);

        // Data freshness
        $lastUpdated = User::whereNotNull('nik')->latest('updated_at')->value('updated_at');

        return view('pages.statistik', compact(
            'totalWarga', 'totalKK', 'totalDusun', 'averageAge', 'dependencyRatio', 'populationDensity',
            'higherEducationRate', 'aidCoverage', 'genderStats', 'ageStats', 'dusunStats',
            'educationStats', 'professionStats', 'maritalStats', 'religionStats', 'aidStats',
            'wargas', 'lastUpdated'
        ));
    }

    public function dataWarga(Request $request)
    {
        $query = User::whereNotNull('nik')->query();

        // Search functionality
        if ($request->filled('q')) {
            $searchTerm = $request->q;
            $query->where(function($q) use ($searchTerm) {
                $q->where('nama_lengkap', 'like', "%{$searchTerm}%")
                  ->orWhere('nik', 'like', "%{$searchTerm}%")
                  ->orWhere('pekerjaan', 'like', "%{$searchTerm}%")
                  ->orWhere('agama', 'like', "%{$searchTerm}%")
                  ->orWhere('status_perkawinan', 'like', "%{$searchTerm}%")
                  ->orWhere('pendidikan', 'like', "%{$searchTerm}%");
            });
        }

        // Enhanced Filters
        if ($request->filled('gender')) {
            $query->where('jenis_kelamin', $request->gender);
        }

        if ($request->filled('dusun')) {
            $query->where('dusun', $request->dusun);
        }

        if ($request->filled('religion')) {
            $query->where('agama', $request->religion);
        }

        if ($request->filled('status')) {
            $query->where('status_perkawinan', $request->status);
        }

        // New enhanced filters
        if ($request->filled('education')) {
            $query->where('pendidikan', $request->education);
        }

        if ($request->filled('profession')) {
            $query->where('pekerjaan', $request->profession);
        }

        if ($request->filled('age_range')) {
            switch ($request->age_range) {
                case 'child':
                    $query->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 17');
                    break;
                case 'adult':
                    $query->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 17 AND 60');
                    break;
                case 'senior':
                    $query->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) > 60');
                    break;
            }
        }

        if ($request->filled('status_aktif')) {
            $query->where('status', $request->status_aktif);
        }

        // Handle pagination without URL changes
        $page = $request->get('page', 1);
        $perPage = 15;

        // Clone query for statistics (before pagination)
        $statsQuery = clone $query;

        // Get paginated results
        $wargas = $query->paginate($perPage, ['*'], 'page', $page);

        // Keep current URL parameters in pagination links
        $wargas->appends($request->except('page'));

        // Calculate dynamic statistics based on current filters
        $filteredTotal = $statsQuery->count();
        $filteredGenderStats = $statsQuery->selectRaw('jenis_kelamin, COUNT(*) as count')
            ->groupBy('jenis_kelamin')
            ->pluck('count', 'jenis_kelamin')
            ->toArray();

        $filteredAgeStats = $statsQuery->selectRaw('
            CASE
                WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 5 THEN "Balita"
                WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 17 THEN "Anak"
                WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 60 THEN "Dewasa"
                ELSE "Lansia"
            END as age_group,
            COUNT(*) as count
        ')
            ->groupBy('age_group')
            ->pluck('count', 'age_group')
            ->toArray();

        $filteredEducationStats = $statsQuery->selectRaw('pendidikan, COUNT(*) as count')
            ->groupBy('pendidikan')
            ->pluck('count', 'pendidikan')
            ->toArray();

        $filteredProfessionStats = $statsQuery->selectRaw('pekerjaan, COUNT(*) as count')
            ->groupBy('pekerjaan')
            ->orderBy('count', 'desc')
            ->limit(8)
            ->pluck('count', 'pekerjaan')
            ->toArray();

        // Overall statistics (unfiltered)
        $totalWarga = User::whereNotNull('nik')->count();
        $totalKK = User::whereNotNull('nik')->distinct('no_kk')->count();
        $activeWarga = User::whereNotNull('nik')->where('status', 'aktif')->count();

        // Get distinct values for filter options
        $educationOptions = User::whereNotNull('nik')->distinct()->pluck('pendidikan')->filter()->sort()->values();
        $professionOptions = User::whereNotNull('nik')->distinct()->pluck('pekerjaan')->filter()->sort()->values();
        $dusunOptions = User::whereNotNull('nik')->distinct()->pluck('dusun')->filter()->sort()->values();

        $data = compact(
            'wargas', 'totalWarga', 'totalKK', 'activeWarga', 'filteredTotal',
            'filteredGenderStats', 'filteredAgeStats', 'filteredEducationStats', 'filteredProfessionStats',
            'educationOptions', 'professionOptions', 'dusunOptions'
        );

        // If AJAX request, return JSON with all data
        if ($request->ajax()) {
            if ($request->get('charts_only') === '1') {
                // Return only chart data for updates
                return response()->json([
                    'filteredTotal' => $filteredTotal,
                    'filteredGenderStats' => $filteredGenderStats,
                    'filteredAgeStats' => $filteredAgeStats,
                    'filteredEducationStats' => $filteredEducationStats,
                    'filteredProfessionStats' => $filteredProfessionStats
                ]);
            }

            // Return table HTML
            $tableHtml = view('partials.warga-table-rows', ['wargas' => $wargas])->render();
            $paginationHtml = (string) $wargas->links('pagination.custom');

            return response()->json([
                'html' => $tableHtml,
                'pagination' => $paginationHtml,
                'stats' => [
                    'total' => $filteredTotal,
                    'current_page' => $wargas->currentPage(),
                    'last_page' => $wargas->lastPage(),
                    'from' => $wargas->firstItem(),
                    'to' => $wargas->lastItem()
                ],
                'charts' => [
                    'filteredGenderStats' => $filteredGenderStats,
                    'filteredAgeStats' => $filteredAgeStats,
                    'filteredEducationStats' => $filteredEducationStats,
                    'filteredProfessionStats' => $filteredProfessionStats
                ]
            ]);
        }

        return view('pages.data-warga', $data);
    }

    public function suratOnline()
    {
        return view('pages.surat-online');
    }

    public function petaDesa()
    {
        return view('pages.peta-desa');
    }

    public function pengaduan()
    {
        // Get pengaduan statistics
        $totalPengaduan = Pengaduan::count();
        $pengaduanSelesai = Pengaduan::where('status', 'Selesai')->count();
        $pengaduanDalamProses = Pengaduan::where('status', 'Dalam Proses')->count();
        $pengaduanMenunggu = Pengaduan::where('status', 'Diterima')->count();
        $pengaduanDitolak = Pengaduan::where('status', 'Ditolak')->count();

        // Calculate percentages
        $persentaseSelesai = $totalPengaduan > 0 ? round(($pengaduanSelesai / $totalPengaduan) * 100, 1) : 0;
        $persentaseDalamProses = $totalPengaduan > 0 ? round(($pengaduanDalamProses / $totalPengaduan) * 100, 1) : 0;
        $persentaseMenunggu = $totalPengaduan > 0 ? round(($pengaduanMenunggu / $totalPengaduan) * 100, 1) : 0;
        $persentaseDitolak = $totalPengaduan > 0 ? round(($pengaduanDitolak / $totalPengaduan) * 100, 1) : 0;

        // Get recent complaints
        $pengaduanTerbaru = Pengaduan::latest()
            ->limit(6)
            ->get();

        // Get complaints by type
        $jenisPengaduanStats = Pengaduan::selectRaw('jenis_pengaduan, COUNT(*) as count')
            ->groupBy('jenis_pengaduan')
            ->orderBy('count', 'desc')
            ->pluck('count', 'jenis_pengaduan')
            ->toArray();

        // Get complaints by priority
        $prioritasStats = Pengaduan::selectRaw('prioritas, COUNT(*) as count')
            ->groupBy('prioritas')
            ->orderBy('count', 'desc')
            ->pluck('count', 'prioritas')
            ->toArray();

        // Get monthly trend (last 6 months)
        $trendBulanan = Pengaduan::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as bulan, COUNT(*) as count')
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('count', 'bulan')
            ->toArray();

        // Get average response time
        $avgResponseTime = Pengaduan::whereNotNull('tanggal_selesai')
            ->selectRaw('AVG(DATEDIFF(tanggal_selesai, created_at)) as avg_days')
            ->value('avg_days');
        $avgResponseTime = round($avgResponseTime ?? 0, 1);

        // Get satisfaction rate (assuming completed complaints are satisfied)
        $satisfactionRate = $pengaduanSelesai > 0 ? round(($pengaduanSelesai / ($pengaduanSelesai + $pengaduanDitolak)) * 100, 1) : 0;

        // Get active officers
        $petugasAktif = Pengaduan::whereNotNull('petugas')
            ->distinct('petugas')
            ->count('petugas');

        $data = compact(
            'totalPengaduan', 'pengaduanSelesai', 'pengaduanDalamProses', 'pengaduanMenunggu', 'pengaduanDitolak',
            'persentaseSelesai', 'persentaseDalamProses', 'persentaseMenunggu', 'persentaseDitolak',
            'pengaduanTerbaru', 'jenisPengaduanStats', 'prioritasStats', 'trendBulanan',
            'avgResponseTime', 'satisfactionRate', 'petugasAktif'
        );

        return view('pages.pengaduan', $data);
    }

    public function storePengaduan(PengaduanRequest $request, FonnteService $fonnte)
    {

        try {
            // Handle file upload if exists
            $lampiranPath = null;
            if ($request->hasFile('bukti')) {
                $file = $request->file('bukti');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $lampiranPath = $file->storeAs('pengaduan', $fileName, 'public');
            }

            // Create pengaduan
            $pengaduan = Pengaduan::create([
                'nomor_tracking' => Pengaduan::generateTrackingNumber(),
                'nama_lengkap' => $request->nama,
                'nik' => $request->nik,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'jenis_pengaduan' => $request->jenis_pengaduan,
                'prioritas' => $request->prioritas,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'lokasi' => $request->lokasi,
                'tanggal_kejadian' => $request->tanggal_kejadian,
                'lampiran' => $lampiranPath,
                'anonim' => $request->boolean('anonim'),
                'status' => 'Diterima',
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Notify Kepala Desa (centralized)
            $fonnte->sendPengaduanToKades($pengaduan);

            return response()->json([
                'success' => true,
                'message' => 'Pengaduan berhasil dikirim!',
                'tracking_number' => $pengaduan->nomor_tracking,
                'redirect' => route('pengaduan') . '?no=' . $pengaduan->nomor_tracking . '#cek-status'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function statusPengaduan(string $nomor_tracking)
    {
        $pengaduan = Pengaduan::where('nomor_tracking', $nomor_tracking)->first();
        if (!$pengaduan) {
            return response()->json([
                'success' => false,
                'message' => 'Pengaduan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'nomor_tracking' => $pengaduan->nomor_tracking,
                'judul' => $pengaduan->judul,
                'status' => $pengaduan->status,
                'prioritas' => $pengaduan->prioritas,
                'created_at' => $pengaduan->created_at?->toDateTimeString(),
                'tanggal_selesai' => optional($pengaduan->tanggal_selesai)->toDateTimeString(),
                'petugas' => $pengaduan->petugas,
            ]
        ]);
    }
}
