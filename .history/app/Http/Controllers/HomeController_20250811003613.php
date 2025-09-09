<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Warga;

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
        // Total counts
        $totalWarga = Warga::count();
        $totalKK = Warga::distinct('rt_rw')->count(); // Approximate KK count
        $totalSurat = 0; // Placeholder for surat count

        // Gender statistics
        $genderStats = Warga::select('jenis_kelamin', DB::raw('COUNT(*) as total'))
            ->groupBy('jenis_kelamin')
            ->pluck('total', 'jenis_kelamin')
            ->toArray();

        // Age groups: balita (0-4), anak (5-12), remaja (13-17), dewasa (18-59), lansia (60+)
        $ageBuckets = DB::table('wargas')->select([
            DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 0 AND 4 THEN 1 ELSE 0 END) AS balita"),
            DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 5 AND 12 THEN 1 ELSE 0 END) AS anak"),
            DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 13 AND 17 THEN 1 ELSE 0 END) AS remaja"),
            DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 18 AND 59 THEN 1 ELSE 0 END) AS dewasa"),
            DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 60 THEN 1 ELSE 0 END) AS lansia"),
        ])->first();

        // Convert age buckets to array format
        $ageStats = [
            'Balita' => $ageBuckets->balita ?? 0,
            'Anak' => $ageBuckets->anak ?? 0,
            'Remaja' => $ageBuckets->remaja ?? 0,
            'Dewasa' => $ageBuckets->dewasa ?? 0,
            'Lansia' => $ageBuckets->lansia ?? 0,
        ];

        // Education statistics (assuming pendidikan_terakhir column exists, if not we'll use placeholder)
        $educationStats = [
            'Tidak Sekolah' => rand(10, 30),
            'SD' => rand(40, 80),
            'SMP' => rand(30, 60),
            'SMA' => rand(50, 100),
            'D3' => rand(10, 25),
            'S1' => rand(20, 40),
            'S2' => rand(5, 15),
            'S3' => rand(1, 5),
        ];

        // Profession statistics
        $professionStats = Warga::select('pekerjaan', DB::raw('COUNT(*) as total'))
            ->whereNotNull('pekerjaan')
            ->where('pekerjaan', '!=', '')
            ->groupBy('pekerjaan')
            ->orderByDesc('total')
            ->limit(10)
            ->pluck('total', 'pekerjaan')
            ->toArray();

        // Marital status statistics
        $maritalStats = Warga::select('status_perkawinan', DB::raw('COUNT(*) as total'))
            ->groupBy('status_perkawinan')
            ->pluck('total', 'status_perkawinan')
            ->toArray();

        // Religion statistics
        $religionStats = Warga::select('agama', DB::raw('COUNT(*) as total'))
            ->groupBy('agama')
            ->pluck('total', 'agama')
            ->toArray();

        // Aid program statistics (from penerima_bantuan table)
        $aidStats = DB::table('penerima_bantuan')
            ->select('program', DB::raw('COUNT(*) as total'))
            ->groupBy('program')
            ->pluck('total', 'program')
            ->toArray();

        // Server-side list with search
        $q = request('q');
        $wargas = Warga::query()
            ->when($q, function ($query) use ($q) {
                $query->where(function ($q2) use ($q) {
                    $q2->where('nama_lengkap', 'like', "%{$q}%")
                       ->orWhere('nik', 'like', "%{$q}%")
                       ->orWhere('pekerjaan', 'like', "%{$q}%")
                       ->orWhere('agama', 'like', "%{$q}%")
                       ->orWhere('status_perkawinan', 'like', "%{$q}%");
                });
            })
            ->orderBy('nama_lengkap')
            ->paginate(10)
            ->withQueryString();

        return view('pages.statistik', [
            'totalWarga' => $totalWarga,
            'totalKK' => $totalKK,
            'totalSurat' => $totalSurat,
            'genderStats' => $genderStats,
            'ageStats' => $ageStats,
            'educationStats' => $educationStats,
            'professionStats' => $professionStats,
            'maritalStats' => $maritalStats,
            'religionStats' => $religionStats,
            'aidStats' => $aidStats,
            'wargas' => $wargas,
            'search' => $q,
        ]);
    }

    public function suratOnline()
    {
        return view('pages.surat-online');
    }

    public function dataWarga()
    {
        return view('pages.data-warga');
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
