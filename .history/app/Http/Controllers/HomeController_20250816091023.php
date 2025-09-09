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
                  ->orWhere('status_perkawinan', 'like', "%{$searchTerm}%");
            });
        }

        // Filter by gender
        if ($request->filled('gender')) {
            $query->where('jenis_kelamin', $request->gender);
        }

        // Filter by dusun
        if ($request->filled('dusun')) {
            $query->where('dusun', $request->dusun);
        }

        // Filter by religion
        if ($request->filled('religion')) {
            $query->where('agama', $request->religion);
        }

        // Filter by marital status
        if ($request->filled('status')) {
            $query->where('status_perkawinan', $request->status);
        }

        $wargas = $query->paginate(15)->withQueryString();

        // Get summary stats
        $totalWarga = Warga::count();
        $totalKK = Warga::distinct('no_kk')->count();
        $activeWarga = Warga::where('status', 'aktif')->count();

        // If AJAX request, return partial view
        if ($request->ajax()) {
            return view('pages.data-warga', compact('wargas', 'totalWarga', 'totalKK', 'activeWarga'));
        }

        return view('pages.data-warga', compact('wargas', 'totalWarga', 'totalKK', 'activeWarga'));
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
        return view('pages.pengaduan');
    }
}
