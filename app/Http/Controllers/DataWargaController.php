<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MonografiDesa;
use App\Services\FotoService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDataWargaRequest;
use App\Http\Requests\UpdateDataWargaRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Exports\DataWargaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller as BaseController;
use Carbon\Carbon;

class DataWargaController extends BaseController
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Filter exclude admin/test users, tapi allow NIK yang - atau kosong
        $query->whereNotNull('nik')
              ->where('nik', 'not like', 'AUTO_%')
              ->whereNotIn('nama_lengkap', ['Test User', 'Administrator Sistem', 'Admin']);

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
            if ($gender == 'Laki-laki') {
                $query->whereIn('jenis_kelamin', ['Laki-laki', 'L']);
            } elseif ($gender == 'Perempuan') {
                $query->whereIn('jenis_kelamin', ['Perempuan', 'P']);
            }
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

        if ($request->filled('education')) {
            $query->where('pendidikan', $request->education);
        }

        if ($request->filled('profession')) {
            $query->where('mata_pencaharian', $request->profession);
        }

        // Age range filter
        if ($request->filled('age_range')) {
            $currentDate = now();
            $query->whereNotNull('tanggal_lahir');

            switch ($request->age_range) {
                case '0-17':
                    $query->where('tanggal_lahir', '>', $currentDate->copy()->subYears(18));
                    break;
                case '18-30':
                    $query->where('tanggal_lahir', '<=', $currentDate->copy()->subYears(18))
                          ->where('tanggal_lahir', '>', $currentDate->copy()->subYears(31));
                    break;
                case '31-50':
                    $query->where('tanggal_lahir', '<=', $currentDate->copy()->subYears(31))
                          ->where('tanggal_lahir', '>', $currentDate->copy()->subYears(51));
                    break;
                case '51+':
                    $query->where('tanggal_lahir', '<=', $currentDate->copy()->subYears(51));
                    break;
            }
        }

        // Age range filter - Note: Temporarily disabled
        // TODO: Implement NIK-based age filtering if needed

        // Sorting - Always group by family by default
        $sortBy = $request->get('sort_by', 'nama_lengkap');
        $sortDirection = $request->get('sort_direction', 'asc');

        // Always group by family (no_kk) and order kepala keluarga first
        // Order by dusun first, then by no_kk, then kepala keluarga first
        $query->orderBy('dusun', 'asc')
              ->orderBy('no_kk', 'asc')
              ->orderBy('is_kepala_keluarga', 'desc')
              ->orderBy('nama_lengkap', 'asc');

        // Pagination
        $perPage = $request->get('per_page', 50);
        $wargas = $query->paginate($perPage)->withQueryString();

        // Process age from NIK for each warga
        $wargas->getCollection()->transform(function ($warga) {
            $ageData = $this->extractAgeFromNIK($warga->nik);
            $warga->calculated_age = $ageData['age'];
            $warga->calculated_birth_date = $ageData['birth_date'];
            $warga->calculated_birth_date_formatted = $ageData['birth_date_formatted'];
            return $warga;
        });

        // Always group data by family, maintaining dusun order
        $familyGroups = $wargas->getCollection()->groupBy('no_kk');

        // Sort family groups by dusun of kepala keluarga
        $familyGroups = $familyGroups->sortBy(function($family) {
            $kepalaKeluarga = $family->where('is_kepala_keluarga', true)->first();
            return $kepalaKeluarga ? $kepalaKeluarga->dusun : 'zzz'; // Put families without kepala at end
        });

        // Filter options for the view
        $dusunOptions = User::whereNotNull('nik')->distinct()->pluck('dusun')->filter()->sort();
        $agamaOptions = User::whereNotNull('nik')->distinct()->pluck('agama')->filter()->sort();
        $statusOptions = User::whereNotNull('nik')->distinct()->pluck('status_perkawinan')->filter()->sort();
        $educationOptions = User::whereNotNull('nik')->distinct()->pluck('pendidikan')->filter()->sort();
        $professionOptions = User::whereNotNull('nik')->distinct()->pluck('mata_pencaharian')->filter()->sort();

        return view('admin.data-warga.index', compact(
            'wargas',
            'dusunOptions',
            'agamaOptions',
            'statusOptions',
            'educationOptions',
            'professionOptions',
            'familyGroups'
        ));
    }

    /**
     * AJAX search for data warga
     */
    public function search(Request $request)
    {
        $query = User::query();

        // Filter exclude admin/test users
        $query->whereNotNull('nik')
              ->where('nik', 'not like', 'AUTO_%')
              ->whereNotIn('nama_lengkap', ['Test User', 'Administrator Sistem', 'Admin']);

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('nama_lengkap', 'like', "%{$searchTerm}%")
                  ->orWhere('nik', 'like', "%{$searchTerm}%")
                  ->orWhere('mata_pencaharian', 'like', "%{$searchTerm}%")
                  ->orWhere('agama', 'like', "%{$searchTerm}%")
                  ->orWhere('status_perkawinan', 'like', "%{$searchTerm}%")
                  ->orWhere('pendidikan', 'like', "%{$searchTerm}%")
                  ->orWhere('dusun', 'like', "%{$searchTerm}%");
            });
        }

        // Always order by dusun first, then by family
        $query->orderBy('dusun', 'asc')
              ->orderBy('no_kk', 'asc')
              ->orderBy('is_kepala_keluarga', 'desc')
              ->orderBy('nama_lengkap', 'asc');

        // Pagination for AJAX
        $perPage = $request->get('per_page', 50);
        $page = $request->get('page', 1);
        $wargas = $query->paginate($perPage, ['*'], 'page', $page);

        // Process age from NIK for each warga
        $wargas->getCollection()->transform(function ($warga) {
            $ageData = $this->extractAgeFromNIK($warga->nik);
            $warga->calculated_age = $ageData['age'];
            $warga->calculated_birth_date = $ageData['birth_date'];
            $warga->calculated_birth_date_formatted = $ageData['birth_date_formatted'];
            return $warga;
        });

        // Group by family
        $familyGroups = $wargas->getCollection()->groupBy('no_kk');

        // Sort family groups by dusun of kepala keluarga
        $familyGroups = $familyGroups->sortBy(function($family) {
            $kepalaKeluarga = $family->where('is_kepala_keluarga', true)->first();
            return $kepalaKeluarga ? $kepalaKeluarga->dusun : 'zzz';
        });

        // Return JSON response with HTML view
        $html = view('admin.data-warga.partials.table-content', [
            'familyGroups' => $familyGroups,
            'wargas' => $wargas
        ])->render();

        return response()->json([
            'html' => $html,
            'pagination' => [
                'current_page' => $wargas->currentPage(),
                'last_page' => $wargas->lastPage(),
                'per_page' => $wargas->perPage(),
                'total' => $wargas->total(),
                'from' => $wargas->firstItem(),
                'to' => $wargas->lastItem()
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.data-warga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDataWargaRequest $request)
    {
        $validated = $request->validated();

        // Validate kepala keluarga constraint
        if (isset($validated['is_kepala_keluarga']) && $validated['is_kepala_keluarga'] && isset($validated['no_kk'])) {
            $existingKepala = User::where('no_kk', $validated['no_kk'])
                                  ->where('is_kepala_keluarga', true)
                                  ->first();

            if ($existingKepala) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['is_kepala_keluarga' => 'Sudah ada kepala keluarga untuk No. KK ini. Silakan ubah status kepala keluarga yang sudah ada terlebih dahulu.']);
            }
        }

        // Handle file upload with FotoService
        if ($request->hasFile('foto')) {
            $fotoService = new FotoService();
            $validated['foto'] = $fotoService->uploadFotoPasfoto($request->file('foto'));
        }

        // Set default password to NIK if empty, then hash
        if (empty($validated['password'])) {
            $validated['password'] = $validated['nik'];
        }
        $validated['password'] = Hash::make($validated['password']);

        $validated['status_aktif'] = true;

        User::create($validated);

        return redirect()->route('data-warga.index')
                        ->with('success', 'Data warga berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $manajemen_data_warga)
    {
        $dataWarga = $manajemen_data_warga;
        return view('admin.data-warga.show', compact('dataWarga'));
    }    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $manajemen_data_warga)
    {
        $dataWarga = $manajemen_data_warga;
        return view('admin.data-warga.edit', compact('dataWarga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataWargaRequest $request, User $manajemen_data_warga)
    {
        $dataWarga = $manajemen_data_warga;
        $validated = $request->validated();

        // Validate kepala keluarga constraint
        if (isset($validated['is_kepala_keluarga']) && $validated['is_kepala_keluarga'] && isset($validated['no_kk'])) {
            $existingKepala = User::where('no_kk', $validated['no_kk'])
                                  ->where('is_kepala_keluarga', true)
                                  ->where('id', '!=', $dataWarga->id) // Exclude current user
                                  ->first();

            if ($existingKepala) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['is_kepala_keluarga' => 'Sudah ada kepala keluarga untuk No. KK ini (' . $existingKepala->nama_lengkap . '). Silakan ubah status kepala keluarga tersebut terlebih dahulu.']);
            }
        }

        // Handle file upload with FotoService
        if ($request->hasFile('foto')) {
            $fotoService = new FotoService();
            $validated['foto'] = $fotoService->uploadFotoPasfoto($request->file('foto'), $dataWarga->foto);
        }

        // Hash password if provided
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $dataWarga->update($validated);

        return redirect()->route('data-warga.index')
                        ->with('success', 'Data warga berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $manajemen_data_warga)
    {
        $dataWarga = $manajemen_data_warga;
        // Delete photo if exists using FotoService
        if ($dataWarga->foto) {
            $fotoService = new FotoService();
            $fotoService->deleteFoto($dataWarga->foto);
        }

        $dataWarga->delete();

        return redirect()->route('data-warga.index')
                        ->with('success', 'Data warga berhasil dihapus.');
    }

    /**
     * Extract age and birth date from NIK
     */
    private function extractAgeFromNIK($nik)
    {
        // Default return values
        $result = [
            'age' => null,
            'birth_date' => null,
            'birth_date_formatted' => null
        ];

        // Check if NIK is valid (16 digits)
        if (!$nik || strlen($nik) < 12) {
            return $result;
        }

        try {
            // Extract birth date from NIK (digit 7-12: DDMMYY)
            $nikDate = substr($nik, 6, 6);
            $day = intval(substr($nikDate, 0, 2));
            $month = intval(substr($nikDate, 2, 2));
            $year = intval(substr($nikDate, 4, 2));

            // Adjust year (assume 1900-2023 range)
            $year = $year > 50 ? 1900 + $year : 2000 + $year;

            // Adjust day for female (subtract 40)
            if ($day > 31) {
                $day = $day - 40;
            }

            // Validate date components
            if ($day < 1 || $day > 31 || $month < 1 || $month > 12) {
                return $result;
            }

            // Create Carbon date
            $birthDate = \Carbon\Carbon::createFromDate($year, $month, $day);

            $result['age'] = $birthDate->age;
            $result['birth_date'] = $birthDate;
            $result['birth_date_formatted'] = $birthDate->format('d M Y');

        } catch (\Exception $e) {
            // Return default values if any error occurs
        }

        return $result;
    }

    /**
     * Export data to Excel
     */
    public function exportExcel(Request $request)
    {
        $filename = 'data-warga-' . date('Y-m-d-H-i-s') . '.xlsx';

        return Excel::download(new DataWargaExport($request), $filename);
    }    /**
     * Export data to PDF
     */
    public function exportPdf(Request $request)
    {
        $wargas = $this->getFilteredData($request);

        // Process age for each warga
        $wargas = $wargas->map(function ($warga) {
            $ageData = $this->extractAgeFromNIK($warga->nik);
            $warga->calculated_age = $ageData['age'];
            return $warga;
        });

        // Get monografi desa data
        $monografi = MonografiDesa::first();

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.data-warga.export-pdf', compact('wargas', 'monografi'));

        return $pdf->download('data-warga-' . date('Y-m-d-H-i-s') . '.pdf');
    }

    /**
     * Export data to CSV
     */
    public function exportCsv(Request $request)
    {
        $wargas = $this->getFilteredData($request);

        // Group by no_kk
        $groupedWargas = $wargas->groupBy('no_kk');

        $filename = 'data-warga-' . date('Y-m-d-H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($groupedWargas) {
            $file = fopen('php://output', 'w');

            // Header CSV
            fputcsv($file, [
                'No',
                'NIK',
                'No. KK',
                'Nama Lengkap',
                'Jenis Kelamin',
                'Umur',
                'Dusun',
                'Agama',
                'Pendidikan',
                'Pekerjaan',
                'Status',
                'Kepala Keluarga'
            ]);

            // Data rows - grouped by family
            $no = 1;
            foreach ($groupedWargas as $noKk => $keluarga) {
                // Find family head
                $kepalaKeluarga = $keluarga->where('is_kepala_keluarga', true)->first();
                $namaKepala = $kepalaKeluarga ? $kepalaKeluarga->nama_lengkap : 'Tidak Ada Kepala Keluarga';

                // Add family header row
                fputcsv($file, [
                    '',
                    '',
                    '',
                    "KELUARGA: {$noKk} - {$namaKepala}",
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    ''
                ]);

                // Sort family members: kepala keluarga first
                $sortedKeluarga = $keluarga->sortByDesc('is_kepala_keluarga');

                foreach ($sortedKeluarga as $warga) {
                    $ageData = $this->extractAgeFromNIK($warga->nik);

                    fputcsv($file, [
                        $no++,
                        $warga->nik,
                        $warga->no_kk,
                        $warga->nama_lengkap,
                        $warga->jenis_kelamin,
                        $ageData['age'] . ' tahun',
                        $warga->dusun,
                        $warga->agama,
                        $warga->pendidikan,
                        $warga->mata_pencaharian,
                        $warga->status_aktif ? 'Aktif' : 'Tidak Aktif',
                        $warga->is_kepala_keluarga ? 'Ya' : 'Tidak'
                    ]);
                }

                // Add empty row between families
                fputcsv($file, ['', '', '', '', '', '', '', '', '', '', '', '']);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Get filtered data for export
     */
    private function getFilteredData(Request $request)
    {
        $query = User::query();

        // Filter exclude admin/test users, tapi allow NIK yang - atau kosong
        $query->whereNotNull('nik')
              ->where('nik', 'not like', 'AUTO_%')
              ->whereNotIn('nama_lengkap', ['Test User', 'Administrator Sistem', 'Admin']);

        // Apply same filters as index method
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

        if ($request->filled('gender')) {
            $gender = $request->gender;
            if ($gender == 'Laki-laki') {
                $query->whereIn('jenis_kelamin', ['Laki-laki', 'L']);
            } elseif ($gender == 'Perempuan') {
                $query->whereIn('jenis_kelamin', ['Perempuan', 'P']);
            }
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

        if ($request->filled('education')) {
            $query->where('pendidikan', $request->education);
        }

        if ($request->filled('profession')) {
            $query->where('mata_pencaharian', $request->profession);
        }

        // Always order by family grouping
        $query->orderBy('no_kk', 'asc')
              ->orderBy('is_kepala_keluarga', 'desc')
              ->orderBy('nama_lengkap', 'asc');

        return $query->get();
    }

    /**
     * Reset password user to NIK
     */
    public function resetPassword(User $dataWarga)
    {
        try {
            // Reset password to NIK
            $dataWarga->update([
                'password' => Hash::make($dataWarga->nik)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Password berhasil direset ke NIK.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mereset password.'
            ], 500);
        }
    }

    /**
     * Get family detail by no_kk
     */
    public function getFamilyDetail($noKK)
    {
        try {
            // Get all family members based on no_kk
            $familyMembers = User::where('no_kk', $noKK)
                ->whereNotNull('nik')
                ->where('nik', 'not like', 'AUTO_%')
                ->whereNotIn('nama_lengkap', ['Test User', 'Administrator Sistem', 'Admin'])
                ->orderByRaw('is_kepala_keluarga DESC')
                ->orderBy('tanggal_lahir', 'ASC')
                ->get();

            if ($familyMembers->isEmpty()) {
                return redirect()->route('data-warga.index')->with('error', 'Data keluarga tidak ditemukan');
            }

            // Get family head (kepala keluarga)
            $kepalaKeluarga = $familyMembers->where('is_kepala_keluarga', true)->first();
            if (!$kepalaKeluarga) {
                $kepalaKeluarga = $familyMembers->first(); // fallback to first member
            }

            // Calculate ages for each member
            $familyMembers->each(function($member) {
                if ($member->tanggal_lahir) {
                    $member->calculated_age = Carbon::parse($member->tanggal_lahir)->age;
                } else {
                    $member->calculated_age = null;
                }
            });

            // Prepare family info
            $familyInfo = [
                'no_kk' => $noKK,
                'kepala_keluarga' => $kepalaKeluarga ? $kepalaKeluarga->nama_lengkap : 'Tidak Diketahui',
                'alamat' => $kepalaKeluarga ? $kepalaKeluarga->alamat : null,
                'dusun' => $kepalaKeluarga ? $kepalaKeluarga->dusun : null,
                'desa' => $kepalaKeluarga ? $kepalaKeluarga->desa : null,
                'kecamatan' => $kepalaKeluarga ? $kepalaKeluarga->kecamatan : null,
                'kabupaten' => $kepalaKeluarga ? $kepalaKeluarga->kabupaten : null,
                'provinsi' => $kepalaKeluarga ? $kepalaKeluarga->provinsi : null,
                'total_anggota' => $familyMembers->count(),
                'total_laki' => $familyMembers->whereIn('jenis_kelamin', ['Laki-laki', 'L'])->count(),
                'total_perempuan' => $familyMembers->whereIn('jenis_kelamin', ['Perempuan', 'P'])->count(),
                'total_aktif' => $familyMembers->where('status_aktif', true)->count(),
                'rata_rata_umur' => $familyMembers->where('calculated_age', '!=', null)->avg('calculated_age')
            ];

            return view('admin.data-warga.family-detail', compact('familyMembers', 'kepalaKeluarga', 'noKK'));

        } catch (\Exception $e) {
            return redirect()->route('data-warga.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


}
