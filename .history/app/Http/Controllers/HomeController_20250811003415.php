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
        // Charts data
        $genderCounts = Warga::select('jenis_kelamin', DB::raw('COUNT(*) as total'))
            ->groupBy('jenis_kelamin')
            ->pluck('total', 'jenis_kelamin');

        // Age groups: balita (0-4), anak (5-12), remaja (13-17), dewasa (18-59), lansia (60+)
        $ageBuckets = DB::table('wargas')->select([
            DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 0 AND 4 THEN 1 ELSE 0 END) AS balita"),
            DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 5 AND 12 THEN 1 ELSE 0 END) AS anak"),
            DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 13 AND 17 THEN 1 ELSE 0 END) AS remaja"),
            DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 18 AND 59 THEN 1 ELSE 0 END) AS dewasa"),
            DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 60 THEN 1 ELSE 0 END) AS lansia"),
        ])->first();

        $pekerjaanTop = Warga::select('pekerjaan', DB::raw('COUNT(*) as total'))
            ->whereNotNull('pekerjaan')
            ->where('pekerjaan', '!=', '')
            ->groupBy('pekerjaan')
            ->orderByDesc('total')
            ->limit(7)
            ->get();
        $totalPekerjaan = Warga::whereNotNull('pekerjaan')->where('pekerjaan', '!=', '')->count();
        $sumTop = $pekerjaanTop->sum('total');
        $pekerjaanLabels = $pekerjaanTop->pluck('pekerjaan')->toArray();
        $pekerjaanValues = $pekerjaanTop->pluck('total')->toArray();
        if ($totalPekerjaan > $sumTop) {
            $pekerjaanLabels[] = 'Lainnya';
            $pekerjaanValues[] = $totalPekerjaan - $sumTop;
        }

        $statusPerkawinan = Warga::select('status_perkawinan', DB::raw('COUNT(*) as total'))
            ->groupBy('status_perkawinan')
            ->pluck('total', 'status_perkawinan');

        $agama = Warga::select('agama', DB::raw('COUNT(*) as total'))
            ->groupBy('agama')
            ->pluck('total', 'agama');

        // Server-side list with search
        $q = request('q');
        $warga = Warga::query()
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
            'genderCounts' => $genderCounts,
            'ageBuckets' => $ageBuckets,
            'pekerjaanLabels' => $pekerjaanLabels,
            'pekerjaanValues' => $pekerjaanValues,
            'statusPerkawinan' => $statusPerkawinan,
            'agama' => $agama,
            'warga' => $warga,
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
