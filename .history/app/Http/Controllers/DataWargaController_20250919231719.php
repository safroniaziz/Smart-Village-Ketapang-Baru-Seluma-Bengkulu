<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DataWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::whereNotNull('nik');

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

        if ($request->filled('education')) {
            $query->where('pendidikan', $request->education);
        }

        if ($request->filled('profession')) {
            $query->where('pekerjaan', $request->profession);
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

        // Sorting
        $sortBy = $request->get('sort_by', 'nama_lengkap');
        $sortDirection = $request->get('sort_direction', 'asc');
        
        $query->orderBy($sortBy, $sortDirection);

        // Pagination
        $perPage = $request->get('per_page', 10);
        $wargas = $query->paginate($perPage)->withQueryString();

        // Filter options for the view
        $dusunOptions = User::whereNotNull('nik')->distinct()->pluck('dusun')->filter()->sort();
        $agamaOptions = User::whereNotNull('nik')->distinct()->pluck('agama')->filter()->sort();
        $statusOptions = User::whereNotNull('nik')->distinct()->pluck('status_perkawinan')->filter()->sort();
        $educationOptions = User::whereNotNull('nik')->distinct()->pluck('pendidikan')->filter()->sort();
        $professionOptions = User::whereNotNull('nik')->distinct()->pluck('pekerjaan')->filter()->sort();

        return view('data-warga.index', compact(
            'wargas', 
            'dusunOptions', 
            'agamaOptions', 
            'statusOptions', 
            'educationOptions', 
            'professionOptions'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data-warga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|string|unique:users,nik|max:16',
            'nama_lengkap' => 'required|string|max:255',
            'no_kk' => 'nullable|string|max:16',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'rt_rw' => 'nullable|string|max:10',
            'dusun' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pekerjaan' => 'required|string|max:255',
            'pendidikan' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'nullable|string|min:8|confirmed',
            'is_kepala_keluarga' => 'boolean',
            'status_rumah' => 'nullable|string|max:255',
            'status_sosial' => 'nullable|string|max:255',
            'kelayakan_rumah' => 'nullable|string|max:255',
            'mata_pencaharian' => 'nullable|string|max:255',
        ]);

        // Handle file upload
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('warga_photos', 'public');
        }

        // Hash password if provided
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $validated['status_aktif'] = true;

        User::create($validated);

        return redirect()->route('data-warga.index')
                        ->with('success', 'Data warga berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $dataWarga)
    {
        return view('data-warga.show', compact('dataWarga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $dataWarga)
    {
        return view('data-warga.edit', compact('dataWarga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $dataWarga)
    {
        $validated = $request->validate([
            'nik' => ['required', 'string', 'max:16', Rule::unique('users')->ignore($dataWarga->id)],
            'nama_lengkap' => 'required|string|max:255',
            'no_kk' => 'nullable|string|max:16',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'rt_rw' => 'nullable|string|max:10',
            'dusun' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pekerjaan' => 'required|string|max:255',
            'pendidikan' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email' => ['nullable', 'email', Rule::unique('users')->ignore($dataWarga->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'is_kepala_keluarga' => 'boolean',
            'status_rumah' => 'nullable|string|max:255',
            'status_sosial' => 'nullable|string|max:255',
            'kelayakan_rumah' => 'nullable|string|max:255',
            'mata_pencaharian' => 'nullable|string|max:255',
        ]);

        // Handle file upload
        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($dataWarga->foto) {
                Storage::disk('public')->delete($dataWarga->foto);
            }
            $validated['foto'] = $request->file('foto')->store('warga_photos', 'public');
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
    public function destroy(User $dataWarga)
    {
        // Delete photo if exists
        if ($dataWarga->foto) {
            Storage::disk('public')->delete($dataWarga->foto);
        }

        $dataWarga->delete();

        return redirect()->route('data-warga.index')
                        ->with('success', 'Data warga berhasil dihapus.');
    }

    /**
     * Export data to Excel/CSV
     */
    public function export(Request $request)
    {
        // This can be implemented later with Laravel Excel package
        return response()->json(['message' => 'Export functionality coming soon']);
    }
}