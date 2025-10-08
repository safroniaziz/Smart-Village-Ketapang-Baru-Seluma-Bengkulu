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
use App\Models\VisiDesa;
use App\Models\MisiDesa;
use App\Models\PendekatanDesa;
use App\Models\TahapanDesa;
use App\Models\PenjelasanVisi;
use App\Http\Requests\PengaduanRequest;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data real dari database (NIK yang valid, bukan null atau '-')
        $totalWarga = User::where('nik', '!=', '-')->whereNotNull('nik')->count();
        $totalLakiLaki = User::where('nik', '!=', '-')->whereNotNull('nik')->where(function($q) {
            $q->where('jenis_kelamin', 'Laki-laki')->orWhere('jenis_kelamin', 'L');
        })->count();
        $totalPerempuan = User::where('nik', '!=', '-')->whereNotNull('nik')->where(function($q) {
            $q->where('jenis_kelamin', 'Perempuan')->orWhere('jenis_kelamin', 'P');
        })->count();

        // Data distribusi usia (menggunakan Carbon untuk compatibility)
        $currentDate = now();

        $usia0_17 = User::where('nik', '!=', '-')->whereNotNull('nik')
            ->whereNotNull('tanggal_lahir')
            ->get()
            ->filter(function ($user) use ($currentDate) {
                $age = $user->tanggal_lahir->diffInYears($currentDate);
                return $age >= 0 && $age <= 17;
            })
            ->count();

        $usia18_30 = User::where('nik', '!=', '-')->whereNotNull('nik')
            ->whereNotNull('tanggal_lahir')
            ->get()
            ->filter(function ($user) use ($currentDate) {
                $age = $user->tanggal_lahir->diffInYears($currentDate);
                return $age >= 18 && $age <= 30;
            })
            ->count();

        $usia31_45 = User::where('nik', '!=', '-')->whereNotNull('nik')
            ->whereNotNull('tanggal_lahir')
            ->get()
            ->filter(function ($user) use ($currentDate) {
                $age = $user->tanggal_lahir->diffInYears($currentDate);
                return $age >= 31 && $age <= 45;
            })
            ->count();

        $usia46_60 = User::where('nik', '!=', '-')->whereNotNull('nik')
            ->whereNotNull('tanggal_lahir')
            ->get()
            ->filter(function ($user) use ($currentDate) {
                $age = $user->tanggal_lahir->diffInYears($currentDate);
                return $age >= 46 && $age <= 60;
            })
            ->count();

        $usia60Plus = User::where('nik', '!=', '-')->whereNotNull('nik')
            ->whereNotNull('tanggal_lahir')
            ->get()
            ->filter(function ($user) use ($currentDate) {
                $age = $user->tanggal_lahir->diffInYears($currentDate);
                return $age > 60;
            })
            ->count();

        // Data tambahan untuk statistik
        $totalDusun = User::where('nik', '!=', '-')->whereNotNull('nik')->distinct('dusun')->count('dusun');
        $totalKepalaKeluarga = User::where('nik', '!=', '-')->whereNotNull('nik')->where('is_kepala_keluarga', true)->count();

        // Ambil data luas wilayah dari database
        $monografi = MonografiDesa::first();
        $luasWilayah = $monografi ? number_format($monografi->luas_wilayah, 0, ',', '.') . ' Ha' : '24,771 Ha';

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
            'luasWilayah' => $luasWilayah,
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
        $totalLakiLaki = User::where('nik', '!=', '-')->whereNotNull('nik')->where(function($q) {
            $q->where('jenis_kelamin', 'Laki-laki')->orWhere('jenis_kelamin', 'L');
        })->count();
        $totalPerempuan = User::where('nik', '!=', '-')->whereNotNull('nik')->where(function($q) {
            $q->where('jenis_kelamin', 'Perempuan')->orWhere('jenis_kelamin', 'P');
        })->count();

        // Data tambahan untuk statistik
        $totalDusun = User::where('nik', '!=', '-')->whereNotNull('nik')->distinct('dusun')->count('dusun');
        $totalKepalaKeluarga = User::where('nik', '!=', '-')->whereNotNull('nik')->where('is_kepala_keluarga', true)->count();

        // Ambil data dari database yang baru
        $monografi = MonografiDesa::first();
        $batasWilayah = BatasWilayah::all()->keyBy('arah');
        $peruntukanLahan = PeruntukanLahan::all();
        $potensiDesa = PotensiDesa::ordered()->get();
        $iklim = IklimDesa::first();
        $fasilitas = FasilitasDesa::ordered()->get();

        $data = [
            'totalWarga' => $totalWarga,
            'totalLakiLaki' => $totalLakiLaki,
            'totalPerempuan' => $totalPerempuan,
            'totalDusun' => $totalDusun,
            'totalKepalaKeluarga' => $totalKepalaKeluarga,
            'monografi' => $monografi,
            'batasWilayah' => $batasWilayah,
            'peruntukanLahan' => $peruntukanLahan,
            'potensiDesa' => $potensiDesa,
            'iklim' => $iklim,
            'fasilitas' => $fasilitas,
        ];

        return view('pages.tentang', $data);
    }

    public function struktur()
    {
        return view('pages.struktur');
    }

    public function visiMisi()
    {
        $visi = VisiDesa::ordered()->first();
        $misi = MisiDesa::ordered()->get();
        $pendekatan = PendekatanDesa::ordered()->get();
        $tahapan = TahapanDesa::ordered()->get();
        $penjelasanVisi = PenjelasanVisi::ordered()->get();

        return view('pages.visi-misi', compact('visi', 'misi', 'pendekatan', 'tahapan', 'penjelasanVisi'));
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

        // Basic gender stats (menggunakan ORM)
        $genderStats = User::whereNotNull('nik')
            ->groupBy('jenis_kelamin')
            ->selectRaw('jenis_kelamin, COUNT(*) as count')
            ->get()
            ->pluck('count', 'jenis_kelamin')
            ->toArray();

        // Calculate total laki-laki and perempuan for compatibility
        $totalLaki = User::whereNotNull('nik')->where(function($q) {
            $q->where('jenis_kelamin', 'Laki-laki')->orWhere('jenis_kelamin', 'L');
        })->count();
        $totalPerempuan = User::whereNotNull('nik')->where(function($q) {
            $q->where('jenis_kelamin', 'Perempuan')->orWhere('jenis_kelamin', 'P');
        })->count();

        // Calculate percentages
        $persentaseLaki = $totalWarga > 0 ? round(($totalLaki / $totalWarga) * 100, 1) : 0;
        $persentasePerempuan = $totalWarga > 0 ? round(($totalPerempuan / $totalWarga) * 100, 1) : 0;

        // Enhanced age groups with proper categorization (menggunakan Carbon)
        $currentDate = now();
        $users = User::whereNotNull('nik')->whereNotNull('tanggal_lahir')->get();
        $ageStats = [];
        $totalAge = 0;
        $ageCount = 0;

        foreach ($users as $user) {
            $age = $user->tanggal_lahir->diffInYears($currentDate);
            $totalAge += $age;
            $ageCount++;

            if ($age < 5) {
                $ageGroup = 'Balita';
            } elseif ($age < 12) {
                $ageGroup = 'Anak';
            } elseif ($age < 18) {
                $ageGroup = 'Remaja';
            } elseif ($age < 60) {
                $ageGroup = 'Dewasa';
            } else {
                $ageGroup = 'Lansia';
            }

            if (!isset($ageStats[$ageGroup])) {
                $ageStats[$ageGroup] = 0;
            }
            $ageStats[$ageGroup]++;
        }

        // Calculate advanced demographic metrics
        $averageAge = $ageCount > 0 ? round($totalAge / $ageCount, 1) : 0;
        $averageAge = round($averageAge, 1);

        // Dependency ratio calculation
        $dependentPopulation = ($ageStats['Balita'] ?? 0) + ($ageStats['Anak'] ?? 0) + ($ageStats['Lansia'] ?? 0);
        $workingAge = ($ageStats['Remaja'] ?? 0) + ($ageStats['Dewasa'] ?? 0);
        $dependencyRatio = $workingAge > 0 ? round(($dependentPopulation / $workingAge) * 100, 1) : 0;

        // Dusun distribution (menggunakan ORM)
        $dusunStats = User::whereNotNull('nik')
            ->groupBy('dusun')
            ->selectRaw('dusun, COUNT(*) as count')
            ->get()
            ->pluck('count', 'dusun')
            ->toArray();
        $totalDusun = count($dusunStats);

        // Population density (assuming 5 km² total area - adjust as needed)
        $totalArea = 5; // km²
        $populationDensity = round($totalWarga / $totalArea);

        // Education stats (menggunakan ORM)
        $educationStats = User::whereNotNull('nik')
            ->groupBy('pendidikan')
            ->selectRaw('pendidikan, COUNT(*) as count')
            ->get()
            ->pluck('count', 'pendidikan')
            ->toArray();

        // Calculate education insights (termasuk Diploma)
        $higherEducation = ($educationStats['DIPLOMA'] ?? 0) + ($educationStats['D1'] ?? 0) + ($educationStats['D2'] ?? 0) + ($educationStats['D3'] ?? 0) +
                          ($educationStats['D4'] ?? 0) + ($educationStats['S1'] ?? 0) + ($educationStats['S2'] ?? 0) + ($educationStats['S3'] ?? 0);
        $higherEducationRate = $totalWarga > 0 ? round(($higherEducation / $totalWarga) * 100, 1) : 0;

        // Profession stats (menggunakan ORM)
        $professionStats = User::whereNotNull('nik')
            ->groupBy('mata_pencaharian')
            ->selectRaw('mata_pencaharian, COUNT(*) as count')
            ->get()
            ->pluck('count', 'mata_pencaharian')
            ->toArray();
        // Social status stats (menggunakan ORM)
        $rawMaritalStats = User::whereNotNull('nik')
            ->groupBy('status_sosial')
            ->selectRaw('status_sosial, COUNT(*) as count')
            ->get()
            ->pluck('count', 'status_sosial')
            ->toArray();

        // Gabungkan MK dan MISKIN menjadi satu kategori
        $maritalStats = [];
        foreach ($rawMaritalStats as $key => $count) {
            if ($key === 'MK') {
                $maritalStats['Menengah Ke Atas'] = ($maritalStats['Menengah Ke Atas'] ?? 0) + $count;
            } elseif ($key === 'MISKIN') {
                $maritalStats['Miskin'] = ($maritalStats['Miskin'] ?? 0) + $count;
            } else {
                $maritalStats[$key] = $count;
            }
        }
        // Religion stats (menggunakan ORM)
        $religionStats = User::whereNotNull('nik')
            ->groupBy('agama')
            ->selectRaw('agama, COUNT(*) as count')
            ->get()
            ->pluck('count', 'agama')
            ->toArray();

        // House status stats (kepala keluarga saja)
        $houseStatusStats = User::whereNotNull('nik')
            ->where('is_kepala_keluarga', 1)
            ->groupBy('status_rumah')
            ->selectRaw('status_rumah, COUNT(*) as count')
            ->get()
            ->pluck('count', 'status_rumah')
            ->toArray();

        // House quality stats (kepala keluarga saja)
        $houseQualityStats = User::whereNotNull('nik')
            ->where('is_kepala_keluarga', 1)
            ->groupBy('kelayakan_rumah')
            ->selectRaw('kelayakan_rumah, COUNT(*) as count')
            ->get()
            ->pluck('count', 'kelayakan_rumah')
            ->toArray();
        // Aid stats (menggunakan ORM)
        $aidStats = PenerimaBantuan::groupBy('program')
            ->selectRaw('program, COUNT(*) as count')
            ->get()
            ->pluck('count', 'program')
            ->toArray();

        // Detailed program data for dynamic display
        $programDetails = PenerimaBantuan::with('user')
            ->selectRaw('program, COUNT(*) as total_recipients, COUNT(DISTINCT user_id) as unique_recipients')
            ->groupBy('program')
            ->get()
            ->map(function($item) use ($totalWarga) {
                // Calculate average recipients per program (dynamic from database)
                $avgRecipients = $item->total_recipients > 0 ? round($item->total_recipients / $item->unique_recipients, 1) : 0;

                // Program descriptions - with fallback for unknown programs
                $descriptions = [
                    'PKH' => 'Program Keluarga Harapan',
                    'PBI/BPJS' => 'Penerima Bantuan Iuran BPJS',
                    'BPJS DAERAH' => 'BPJS Kesehatan Daerah',
                    'BPJS MANDIRI' => 'BPJS Kesehatan Mandiri',
                    'SEMBAKO' => 'Bantuan Sembako',
                    'BLTDD' => 'Bantuan Langsung Tunai Desa',
                    'BPMT_PPKM' => 'Bantuan Pangan Masyarakat Terdampak PPKM',
                    'BST' => 'Bantuan Sembako Tunai',
                    'BLT_COVID' => 'Bantuan Langsung Tunai COVID-19',
                    'BLT_BBM' => 'Bantuan Langsung Tunai BBM',
                    'BPNT' => 'Bantuan Pangan Non Tunai',
                    'BLT' => 'Bantuan Langsung Tunai',
                    'BSU' => 'Bantuan Subsidi Upah',
                    'BPUM' => 'Bantuan Produktif Usaha Mikro',
                    'Bansos' => 'Bantuan Sosial Umum',
                    'Kartu Prakerja' => 'Program pelatihan & insentif',
                    'PIP' => 'Program Indonesia Pintar',
                    'KIS' => 'Kartu Indonesia Sehat',
                    'BPJS' => 'Badan Penyelenggara Jaminan Sosial',
                    'BLSM' => 'Bantuan Langsung Sementara Masyarakat',
                    'Bantuan' => 'Bantuan sosial umum',
                    'Sembako' => 'Bantuan sembako',
                    'Tunai' => 'Bantuan tunai'
                ];

                // Icons for each program - with fallback for unknown programs
                $icons = [
                    'PKH' => 'fas fa-graduation-cap',
                    'PBI/BPJS' => 'fas fa-shield-alt',
                    'BPJS DAERAH' => 'fas fa-hospital',
                    'BPJS MANDIRI' => 'fas fa-user-md',
                    'SEMBAKO' => 'fas fa-shopping-cart',
                    'BLTDD' => 'fas fa-home',
                    'BPMT_PPKM' => 'fas fa-box',
                    'BST' => 'fas fa-box',
                    'BLT_COVID' => 'fas fa-virus',
                    'BLT_BBM' => 'fas fa-gas-pump',
                    'BPNT' => 'fas fa-shopping-basket',
                    'BLT' => 'fas fa-money-bill-wave',
                    'BSU' => 'fas fa-briefcase',
                    'BPUM' => 'fas fa-store',
                    'Bansos' => 'fas fa-hands-helping',
                    'Kartu Prakerja' => 'fas fa-tools',
                    'PIP' => 'fas fa-user-graduate',
                    'KIS' => 'fas fa-heartbeat',
                    'BPJS' => 'fas fa-shield-alt',
                    'BLSM' => 'fas fa-hand-holding-usd',
                    'Bantuan' => 'fas fa-hand-holding-heart',
                    'Sembako' => 'fas fa-shopping-cart',
                    'Tunai' => 'fas fa-coins'
                ];

                // Color schemes - with fallback for unknown programs
                $colors = [
                    'PKH' => ['bg' => 'from-blue-50 to-indigo-50', 'border' => 'border-blue-200', 'text' => 'text-blue-900', 'subtext' => 'text-blue-700', 'amount' => 'text-blue-600', 'subamount' => 'text-blue-500', 'gradient' => 'from-blue-500 to-indigo-600', 'bar' => 'from-blue-500 to-indigo-600'],
                    'PBI/BPJS' => ['bg' => 'from-teal-50 to-cyan-50', 'border' => 'border-teal-200', 'text' => 'text-teal-900', 'subtext' => 'text-teal-700', 'amount' => 'text-teal-600', 'subamount' => 'text-teal-500', 'gradient' => 'from-teal-500 to-cyan-600', 'bar' => 'from-teal-500 to-cyan-600'],
                    'BPJS DAERAH' => ['bg' => 'from-cyan-50 to-sky-50', 'border' => 'border-cyan-200', 'text' => 'text-cyan-900', 'subtext' => 'text-cyan-700', 'amount' => 'text-cyan-600', 'subamount' => 'text-cyan-500', 'gradient' => 'from-cyan-500 to-sky-600', 'bar' => 'from-cyan-500 to-sky-600'],
                    'BPJS MANDIRI' => ['bg' => 'from-sky-50 to-blue-50', 'border' => 'border-sky-200', 'text' => 'text-sky-900', 'subtext' => 'text-sky-700', 'amount' => 'text-sky-600', 'subamount' => 'text-sky-500', 'gradient' => 'from-sky-500 to-blue-600', 'bar' => 'from-sky-500 to-blue-600'],
                    'SEMBAKO' => ['bg' => 'from-green-50 to-emerald-50', 'border' => 'border-green-200', 'text' => 'text-green-900', 'subtext' => 'text-green-700', 'amount' => 'text-green-600', 'subamount' => 'text-green-500', 'gradient' => 'from-green-500 to-emerald-600', 'bar' => 'from-green-500 to-emerald-600'],
                    'BLTDD' => ['bg' => 'from-purple-50 to-violet-50', 'border' => 'border-purple-200', 'text' => 'text-purple-900', 'subtext' => 'text-purple-700', 'amount' => 'text-purple-600', 'subamount' => 'text-purple-500', 'gradient' => 'from-purple-500 to-violet-600', 'bar' => 'from-purple-500 to-violet-600'],
                    'BPMT_PPKM' => ['bg' => 'from-orange-50 to-amber-50', 'border' => 'border-orange-200', 'text' => 'text-orange-900', 'subtext' => 'text-orange-700', 'amount' => 'text-orange-600', 'subamount' => 'text-orange-500', 'gradient' => 'from-orange-500 to-amber-600', 'bar' => 'from-orange-500 to-amber-600'],
                    'BST' => ['bg' => 'from-amber-50 to-yellow-50', 'border' => 'border-amber-200', 'text' => 'text-amber-900', 'subtext' => 'text-amber-700', 'amount' => 'text-amber-600', 'subamount' => 'text-amber-500', 'gradient' => 'from-amber-500 to-yellow-600', 'bar' => 'from-amber-500 to-yellow-600'],
                    'BLT_COVID' => ['bg' => 'from-red-50 to-pink-50', 'border' => 'border-red-200', 'text' => 'text-red-900', 'subtext' => 'text-red-700', 'amount' => 'text-red-600', 'subamount' => 'text-red-500', 'gradient' => 'from-red-500 to-pink-600', 'bar' => 'from-red-500 to-pink-600'],
                    'BLT_BBM' => ['bg' => 'from-gray-50 to-slate-50', 'border' => 'border-gray-200', 'text' => 'text-gray-900', 'subtext' => 'text-gray-700', 'amount' => 'text-gray-600', 'subamount' => 'text-gray-500', 'gradient' => 'from-gray-500 to-slate-600', 'bar' => 'from-gray-500 to-slate-600'],
                    'BPNT' => ['bg' => 'from-emerald-50 to-teal-50', 'border' => 'border-emerald-200', 'text' => 'text-emerald-900', 'subtext' => 'text-emerald-700', 'amount' => 'text-emerald-600', 'subamount' => 'text-emerald-500', 'gradient' => 'from-emerald-500 to-teal-600', 'bar' => 'from-emerald-500 to-teal-600'],
                    'BLT' => ['bg' => 'from-violet-50 to-purple-50', 'border' => 'border-violet-200', 'text' => 'text-violet-900', 'subtext' => 'text-violet-700', 'amount' => 'text-violet-600', 'subamount' => 'text-violet-500', 'gradient' => 'from-violet-500 to-purple-600', 'bar' => 'from-violet-500 to-purple-600'],
                    'BSU' => ['bg' => 'from-indigo-50 to-blue-50', 'border' => 'border-indigo-200', 'text' => 'text-indigo-900', 'subtext' => 'text-indigo-700', 'amount' => 'text-indigo-600', 'subamount' => 'text-indigo-500', 'gradient' => 'from-indigo-500 to-blue-600', 'bar' => 'from-indigo-500 to-blue-600'],
                    'BPUM' => ['bg' => 'from-rose-50 to-pink-50', 'border' => 'border-rose-200', 'text' => 'text-rose-900', 'subtext' => 'text-rose-700', 'amount' => 'text-rose-600', 'subamount' => 'text-rose-500', 'gradient' => 'from-rose-500 to-pink-600', 'bar' => 'from-rose-500 to-pink-600'],
                    'Bansos' => ['bg' => 'from-lime-50 to-green-50', 'border' => 'border-lime-200', 'text' => 'text-lime-900', 'subtext' => 'text-lime-700', 'amount' => 'text-lime-600', 'subamount' => 'text-lime-500', 'gradient' => 'from-lime-500 to-green-600', 'bar' => 'from-lime-500 to-green-600'],
                    'Kartu Prakerja' => ['bg' => 'from-indigo-50 to-purple-50', 'border' => 'border-indigo-200', 'text' => 'text-indigo-900', 'subtext' => 'text-indigo-700', 'amount' => 'text-indigo-600', 'subamount' => 'text-indigo-500', 'gradient' => 'from-indigo-500 to-purple-600', 'bar' => 'from-indigo-500 to-purple-600'],
                    'PIP' => ['bg' => 'from-violet-50 to-purple-50', 'border' => 'border-violet-200', 'text' => 'text-violet-900', 'subtext' => 'text-violet-700', 'amount' => 'text-violet-600', 'subamount' => 'text-violet-500', 'gradient' => 'from-violet-500 to-purple-600', 'bar' => 'from-violet-500 to-purple-600'],
                    'KIS' => ['bg' => 'from-pink-50 to-rose-50', 'border' => 'border-pink-200', 'text' => 'text-pink-900', 'subtext' => 'text-pink-700', 'amount' => 'text-pink-600', 'subamount' => 'text-pink-500', 'gradient' => 'from-pink-500 to-rose-600', 'bar' => 'from-pink-500 to-rose-600'],
                    'BPJS' => ['bg' => 'from-teal-50 to-cyan-50', 'border' => 'border-teal-200', 'text' => 'text-teal-900', 'subtext' => 'text-teal-700', 'amount' => 'text-teal-600', 'subamount' => 'text-teal-500', 'gradient' => 'from-teal-500 to-cyan-600', 'bar' => 'from-teal-500 to-cyan-600'],
                    'BLSM' => ['bg' => 'from-amber-50 to-yellow-50', 'border' => 'border-amber-200', 'text' => 'text-amber-900', 'subtext' => 'text-amber-700', 'amount' => 'text-amber-600', 'subamount' => 'text-amber-500', 'gradient' => 'from-amber-500 to-yellow-600', 'bar' => 'from-amber-500 to-yellow-600'],
                    'Bantuan' => ['bg' => 'from-slate-50 to-gray-50', 'border' => 'border-slate-200', 'text' => 'text-slate-900', 'subtext' => 'text-slate-700', 'amount' => 'text-slate-600', 'subamount' => 'text-slate-500', 'gradient' => 'from-slate-500 to-gray-600', 'bar' => 'from-slate-500 to-gray-600'],
                    'Sembako' => ['bg' => 'from-green-50 to-emerald-50', 'border' => 'border-green-200', 'text' => 'text-green-900', 'subtext' => 'text-green-700', 'amount' => 'text-green-600', 'subamount' => 'text-green-500', 'gradient' => 'from-green-500 to-emerald-600', 'bar' => 'from-green-500 to-emerald-600'],
                    'Tunai' => ['bg' => 'from-yellow-50 to-amber-50', 'border' => 'border-yellow-200', 'text' => 'text-yellow-900', 'subtext' => 'text-yellow-700', 'amount' => 'text-yellow-600', 'subamount' => 'text-yellow-500', 'gradient' => 'from-yellow-500 to-amber-600', 'bar' => 'from-yellow-500 to-amber-600']
                ];

                // Generate random color for unknown programs
                $colorOptions = ['blue', 'emerald', 'purple', 'orange', 'cyan', 'pink', 'indigo', 'teal', 'violet', 'amber'];
                $randomColor = $colorOptions[array_rand($colorOptions)];

                return [
                    'program' => $item->program,
                    'total_recipients' => $item->total_recipients,
                    'unique_recipients' => $item->unique_recipients,
                    'avg_recipients' => $avgRecipients,
                    'description' => $descriptions[$item->program] ?? 'Program bantuan sosial',
                    'icon' => $icons[$item->program] ?? 'fas fa-hand-holding-heart',
                    'colors' => $colors[$item->program] ?? [
                        'bg' => "from-{$randomColor}-50 to-{$randomColor}-100",
                        'border' => "border-{$randomColor}-200",
                        'text' => "text-{$randomColor}-900",
                        'subtext' => "text-{$randomColor}-700",
                        'amount' => "text-{$randomColor}-600",
                        'subamount' => "text-{$randomColor}-500",
                        'gradient' => "from-{$randomColor}-500 to-{$randomColor}-600",
                        'bar' => "from-{$randomColor}-500 to-{$randomColor}-600"
                    ],
                    'percentage' => $totalWarga > 0 ? round(($item->unique_recipients / $totalWarga) * 100, 1) : 0
                ];
            })
            ->sortByDesc('unique_recipients');

        // Calculate aid coverage
        $totalAidRecipients = PenerimaBantuan::distinct('user_id')->count();
        $aidCoverage = $totalWarga > 0 ? round(($totalAidRecipients / $totalWarga) * 100, 1) : 0;

        // Calculate total aid value (dynamic from database)
        $totalAidValue = PenerimaBantuan::where('status', 'Aktif')->sum('nominal');
        $totalAidValueFormatted = $totalAidValue > 1000000 ? 
            round($totalAidValue / 1000000, 1) . 'M' : 
            number_format($totalAidValue / 1000, 0) . 'K';

        // Calculate effectiveness rate (dynamic from database)
        $totalAidRecords = PenerimaBantuan::count();
        $activeAidRecords = PenerimaBantuan::where('status', 'Aktif')->count();
        $effectivenessRate = $totalAidRecords > 0 ? round(($activeAidRecords / $totalAidRecords) * 100, 0) : 0;

        $wargas = User::whereNotNull('nik')->paginate(10);

        // Data freshness
        $lastUpdated = User::whereNotNull('nik')->latest('updated_at')->value('updated_at');

        // Get village information from database
        $monografi = MonografiDesa::first();
        $villageName = $monografi ? $monografi->nama_desa : 'Desa Ketapang Baru';
        $districtName = $monografi ? $monografi->kecamatan : 'Kecamatan Semidang Alas Maras';

        return view('pages.statistik', compact(
            'totalWarga', 'totalKK', 'totalDusun', 'averageAge', 'dependencyRatio', 'populationDensity',
            'higherEducationRate', 'aidCoverage', 'totalAidRecipients', 'genderStats', 'ageStats', 'dusunStats',
            'educationStats', 'professionStats', 'maritalStats', 'religionStats', 'aidStats', 'programDetails',
            'wargas', 'lastUpdated', 'totalLaki', 'totalPerempuan', 'persentaseLaki', 'persentasePerempuan',
            'houseStatusStats', 'houseQualityStats', 'villageName', 'districtName'
        ));
    }

    public function dataWarga(Request $request)
    {
        $query = User::whereNotNull('nik');

        // Search functionality
        if ($request->filled('q')) {
            $searchTerm = $request->q;
            $query->where(function($q) use ($searchTerm) {
                $q->where('nama_lengkap', 'like', "%{$searchTerm}%")
                  ->orWhere('nik', 'like', "%{$searchTerm}%")
                  ->orWhere('mata_pencaharian', 'like', "%{$searchTerm}%")
                  ->orWhere('agama', 'like', "%{$searchTerm}%")
                  ->orWhere('status_perkawinan', 'like', "%{$searchTerm}%")
                  ->orWhere('pendidikan', 'like', "%{$searchTerm}%");
            });
        }

        // Enhanced Filters
        if ($request->filled('gender')) {
            $gender = $request->gender;
            $query->where(function($q) use ($gender) {
                $q->where('jenis_kelamin', $gender);
                // Handle both formats for backward compatibility
                if ($gender == 'Laki-laki') {
                    $q->orWhere('jenis_kelamin', 'L');
                } elseif ($gender == 'Perempuan') {
                    $q->orWhere('jenis_kelamin', 'P');
                }
            });
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
            $query->where('mata_pencaharian', $request->profession);
        }

        // Get users before age filtering
        $baseUsers = $query->whereNotNull('tanggal_lahir')->get();

        if ($request->filled('age_range')) {
            $currentDate = now();
            $filteredUsers = $baseUsers->filter(function ($user) use ($request, $currentDate) {
                $age = $user->tanggal_lahir->diffInYears($currentDate);
                switch ($request->age_range) {
                    case 'child':
                        return $age < 17;
                    case 'adult':
                        return $age >= 17 && $age <= 60;
                    case 'senior':
                        return $age > 60;
                    default:
                        return true;
                }
            });

            // Convert back to query builder for pagination
            $userIds = $filteredUsers->pluck('id')->toArray();
            $query = User::whereIn('id', $userIds);
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

        // Calculate dynamic statistics based on current filters (menggunakan ORM)
        $filteredTotal = $statsQuery->count();
        $filteredGenderStats = $statsQuery->groupBy('jenis_kelamin')
            ->selectRaw('jenis_kelamin, COUNT(*) as count')
            ->get()
            ->pluck('count', 'jenis_kelamin')
            ->toArray();

        // Calculate dynamic statistics based on current filters (menggunakan Carbon)
        $filteredUsers = $statsQuery->whereNotNull('tanggal_lahir')->get();
        $filteredAgeStats = [];
        $currentDate = now();

        foreach ($filteredUsers as $user) {
            $age = $user->tanggal_lahir->diffInYears($currentDate);

            if ($age < 5) {
                $ageGroup = 'Balita';
            } elseif ($age < 17) {
                $ageGroup = 'Anak';
            } elseif ($age < 60) {
                $ageGroup = 'Dewasa';
            } else {
                $ageGroup = 'Lansia';
            }

            if (!isset($filteredAgeStats[$ageGroup])) {
                $filteredAgeStats[$ageGroup] = 0;
            }
            $filteredAgeStats[$ageGroup]++;
        }

        // Filtered education stats (menggunakan ORM)
        $filteredEducationStats = $statsQuery->groupBy('pendidikan')
            ->selectRaw('pendidikan, COUNT(*) as count')
            ->get()
            ->pluck('count', 'pendidikan')
            ->toArray();

        // Filtered profession stats (menggunakan ORM)
        $filteredProfessionStats = $statsQuery->groupBy('mata_pencaharian')
            ->selectRaw('mata_pencaharian, COUNT(*) as count')
            ->orderBy('count', 'desc')
            ->limit(8)
            ->get()
            ->pluck('count', 'mata_pencaharian')
            ->toArray();

        // Overall statistics (unfiltered)
        $totalWarga = User::whereNotNull('nik')->count();
        $totalKK = User::whereNotNull('nik')->distinct('no_kk')->count();
        $activeWarga = User::whereNotNull('nik')->where('status', 'aktif')->count();

        // Calculate total laki-laki and perempuan for compatibility
        $totalLaki = User::whereNotNull('nik')->where(function($q) {
            $q->where('jenis_kelamin', 'Laki-laki')->orWhere('jenis_kelamin', 'L');
        })->count();
        $totalPerempuan = User::whereNotNull('nik')->where(function($q) {
            $q->where('jenis_kelamin', 'Perempuan')->orWhere('jenis_kelamin', 'P');
        })->count();

        // Calculate percentages
        $persentaseLaki = $totalWarga > 0 ? round(($totalLaki / $totalWarga) * 100, 1) : 0;
        $persentasePerempuan = $totalWarga > 0 ? round(($totalPerempuan / $totalWarga) * 100, 1) : 0;

        // Get distinct values for filter options
        $educationOptions = User::whereNotNull('nik')->distinct()->pluck('pendidikan')->filter()->sort()->values();
        $professionOptions = User::whereNotNull('nik')->distinct()->pluck('mata_pencaharian')->filter()->sort()->values();
        $dusunOptions = User::whereNotNull('nik')->distinct()->pluck('dusun')->filter()->sort()->values();

        $data = compact(
            'wargas', 'totalWarga', 'totalKK', 'activeWarga', 'filteredTotal',
            'filteredGenderStats', 'filteredAgeStats', 'filteredEducationStats', 'filteredProfessionStats',
            'educationOptions', 'professionOptions', 'dusunOptions', 'totalLaki', 'totalPerempuan',
            'persentaseLaki', 'persentasePerempuan'
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

        // Get complaints by type (menggunakan ORM)
        $jenisPengaduanStats = Pengaduan::groupBy('jenis_pengaduan')
            ->selectRaw('jenis_pengaduan, COUNT(*) as count')
            ->orderBy('count', 'desc')
            ->get()
            ->pluck('count', 'jenis_pengaduan')
            ->toArray();

        // Get complaints by priority (menggunakan ORM)
        $prioritasStats = Pengaduan::groupBy('prioritas')
            ->selectRaw('prioritas, COUNT(*) as count')
            ->orderBy('count', 'desc')
            ->get()
            ->pluck('count', 'prioritas')
            ->toArray();

        // Get monthly trend using Carbon (last 6 months)
        $pengaduanBulanan = Pengaduan::where('created_at', '>=', now()->subMonths(6))
            ->get()
            ->groupBy(function($pengaduan) {
                return $pengaduan->created_at->format('Y-m');
            })
            ->map(function($group) {
                return $group->count();
            })
            ->toArray();

        $trendBulanan = $pengaduanBulanan;

        // Get average response time (menggunakan Carbon)
        $pengaduanSelesai = Pengaduan::whereNotNull('tanggal_selesai')->get();
        $totalDays = 0;
        $count = 0;

        foreach ($pengaduanSelesai as $pengaduan) {
            $days = $pengaduan->created_at->diffInDays($pengaduan->tanggal_selesai);
            $totalDays += $days;
            $count++;
        }

        $avgResponseTime = $count > 0 ? round($totalDays / $count, 1) : 0;

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
