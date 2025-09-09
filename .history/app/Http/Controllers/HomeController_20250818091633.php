<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Warga;
use App\Models\PenerimaBantuan;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function tentang()
    {
        return view('pages.tentang');
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
        $totalWarga = Warga::count();
        $totalKK = Warga::distinct('no_kk')->count();

        // Basic gender stats
        $genderStats = Warga::selectRaw('jenis_kelamin, COUNT(*) as count')
            ->groupBy('jenis_kelamin')
            ->pluck('count', 'jenis_kelamin')
            ->toArray();

        // Enhanced age groups with proper categorization
        $ageStats = Warga::selectRaw('
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
        $averageAge = Warga::whereNotNull('tanggal_lahir')
            ->selectRaw('AVG(TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE())) as avg_age')
            ->value('avg_age');
        $averageAge = round($averageAge, 1);

        // Dependency ratio calculation
        $dependentPopulation = ($ageStats['Balita'] ?? 0) + ($ageStats['Anak'] ?? 0) + ($ageStats['Lansia'] ?? 0);
        $workingAge = ($ageStats['Remaja'] ?? 0) + ($ageStats['Dewasa'] ?? 0);
        $dependencyRatio = $workingAge > 0 ? round(($dependentPopulation / $workingAge) * 100, 1) : 0;

        // Dusun distribution
        $dusunStats = Warga::selectRaw('dusun, COUNT(*) as count')
            ->groupBy('dusun')
            ->pluck('count', 'dusun')
            ->toArray();
        $totalDusun = count($dusunStats);

        // Population density (assuming 5 km² total area - adjust as needed)
        $totalArea = 5; // km²
        $populationDensity = round($totalWarga / $totalArea);

        // Education stats
        $educationStats = Warga::selectRaw('pendidikan, COUNT(*) as count')
            ->groupBy('pendidikan')
            ->pluck('count', 'pendidikan')
            ->toArray();

        // Calculate education insights
        $higherEducation = ($educationStats['S1'] ?? 0) + ($educationStats['S2'] ?? 0) + ($educationStats['S3'] ?? 0);
        $higherEducationRate = $totalWarga > 0 ? round(($higherEducation / $totalWarga) * 100, 1) : 0;

        $professionStats = Warga::selectRaw('pekerjaan, COUNT(*) as count')
            ->groupBy('pekerjaan')
            ->pluck('count', 'pekerjaan')
            ->toArray();
        $maritalStats = Warga::selectRaw('status_perkawinan, COUNT(*) as count')
            ->groupBy('status_perkawinan')
            ->pluck('count', 'status_perkawinan')
            ->toArray();
        $religionStats = Warga::selectRaw('agama, COUNT(*) as count')
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

        $wargas = Warga::paginate(10);

        // Data freshness
        $lastUpdated = Warga::latest('updated_at')->value('updated_at');

        return view('pages.statistik', compact(
            'totalWarga', 'totalKK', 'totalDusun', 'averageAge', 'dependencyRatio', 'populationDensity',
            'higherEducationRate', 'aidCoverage', 'genderStats', 'ageStats', 'dusunStats',
            'educationStats', 'professionStats', 'maritalStats', 'religionStats', 'aidStats',
            'wargas', 'lastUpdated'
        ));
    }

    public function dataWarga(Request $request)
    {
        $query = Warga::query();

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
        $totalWarga = Warga::count();
        $totalKK = Warga::distinct('no_kk')->count();
        $activeWarga = Warga::where('status', 'aktif')->count();

        // Get distinct values for filter options
        $educationOptions = Warga::distinct()->pluck('pendidikan')->filter()->sort()->values();
        $professionOptions = Warga::distinct()->pluck('pekerjaan')->filter()->sort()->values();
        $dusunOptions = Warga::distinct()->pluck('dusun')->filter()->sort()->values();

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
            $paginationHtml = $wargas->links('pagination.custom')->render();

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
}
