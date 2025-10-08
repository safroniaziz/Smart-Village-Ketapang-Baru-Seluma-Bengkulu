<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataWargaController;
use Illuminate\Support\Facades\Route;
use App\Services\FonnteService;
use App\Http\Requests\PengajuanSuratRequest;
use App\Models\PengajuanSurat;

// Home Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Profile Routes
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');
Route::get('/struktur', [HomeController::class, 'struktur'])->name('struktur');
Route::get('/visi-misi', [HomeController::class, 'visiMisi'])->name('visi.misi');

// Information Routes
Route::get('/berita', [HomeController::class, 'berita'])->name('berita');
Route::get('/pengumuman', [HomeController::class, 'pengumuman'])->name('pengumuman');
Route::get('/statistik', [HomeController::class, 'statistik'])->name('statistik');

// Data Warga CRUD Routes (require authentication) - Admin routes
Route::middleware(['auth'])->group(function () {
    Route::resource('admin/data-warga', DataWargaController::class)->names([
        'index' => 'data-warga.index',
        'create' => 'data-warga.create',
        'store' => 'data-warga.store',
        'show' => 'data-warga.show',
        'edit' => 'data-warga.edit',
        'update' => 'data-warga.update',
        'destroy' => 'data-warga.destroy',
    ]);
});

// Public Data Warga Page (uses HomeController for public view)
Route::get('/data-warga', [HomeController::class, 'dataWarga'])->name('data.warga');

// Keep the old route for backward compatibility
Route::get('/data-warga-legacy', [HomeController::class, 'dataWarga'])->name('data.warga.legacy');

// Service Routes
Route::get('/surat-online', [HomeController::class, 'suratOnline'])->name('surat.online');
Route::get('/peta-desa', [HomeController::class, 'petaDesa'])->name('peta.desa');
Route::get('/pengaduan', [HomeController::class, 'pengaduan'])->name('pengaduan');
Route::post('/pengaduan', [HomeController::class, 'storePengaduan'])->name('pengaduan.store');
Route::get('/pengaduan/status/{nomor_tracking}', [HomeController::class, 'statusPengaduan'])->name('pengaduan.status');

// Surat Kehilangan Routes
Route::post('/surat-kehilangan/store', [App\Http\Controllers\SuratController::class, 'storePengajuanKehilangan'])->name('surat-kehilangan.store');
Route::get('/surat-kehilangan/pdf/{id}', [App\Http\Controllers\SuratController::class, 'generatePDFKehilangan'])->name('surat-kehilangan.pdf');
Route::get('/surat-kehilangan/preview/{id}', [App\Http\Controllers\SuratController::class, 'previewPDFKehilangan'])->name('surat-kehilangan.preview');

// Surat Bersih Diri Routes
Route::get('/surat-bersih-diri', [App\Http\Controllers\SuratController::class, 'generateSuratBersihDiri'])->name('surat-bersih-diri');
Route::post('/surat-bersih-diri', [App\Http\Controllers\SuratController::class, 'generateSuratBersihDiri'])->name('surat-bersih-diri.post');

// Public Surat Kehilangan Routes (tanpa login)
Route::get('/surat-kehilangan/public', [App\Http\Controllers\SuratController::class, 'showPublicForm'])->name('surat-kehilangan.public');
Route::post('/surat-kehilangan/validate-nik', [App\Http\Controllers\SuratController::class, 'validateNIK'])->name('surat-kehilangan.validate-nik');
Route::post('/surat-kehilangan/submit-public', [App\Http\Controllers\SuratController::class, 'storePengajuanPublic'])->name('surat-kehilangan.submit-public');
Route::get('/surat-kehilangan/status/{id}', [App\Http\Controllers\SuratController::class, 'checkStatus'])->name('surat-kehilangan.status');

// Test PDF Routes (untuk preview manual)
Route::get('/test-pdf-kehilangan', [App\Http\Controllers\SuratController::class, 'testPDFKehilangan'])->name('test.pdf.kehilangan');

// Surat Online submit
Route::post('/surat-online', function (PengajuanSuratRequest $request, FonnteService $fonnte) {
    $lampiranPath = null;
    if ($request->hasFile('lampiran')) {
        $file = $request->file('lampiran');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $lampiranPath = $file->storeAs('surat', $fileName, 'public');
    }

    $pengajuan = PengajuanSurat::create([
        'nama_lengkap' => $request->nama,
        'nik' => $request->nik,
        'no_hp' => $request->no_hp,
        'alamat' => $request->alamat,
        'jenis_surat' => $request->jenis_surat,
        'keperluan' => $request->keperluan,
        'lampiran' => $lampiranPath,
        'status' => 'Diajukan',
    ]);

    // Notify Kades (info only)
    $message = "Pengajuan Surat Baru\n"
        . "Nama: {$pengajuan->nama_lengkap}\n"
        . "Jenis: {$pengajuan->jenis_surat}\n"
        . "Waktu: " . now()->toDateTimeString();
    $fonnte->send(config('services.kades_wa'), $message);

    return response()->json([
        'success' => true,
        'message' => 'Pengajuan surat berhasil dikirim!',
    ]);
})->name('surat.online.store');

// Public Surat Online (tanpa login, dengan validasi NIK)
Route::post('/surat-online/public', [App\Http\Controllers\SuratController::class, 'handlePublicSuratOnline'])->name('surat.online.public');

// Debug routes removed

// Contact Route
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');

// Dashboard (Breeze)
Route::get('/dashboard', function () {
    $totalUsers = \App\Models\User::count();
    $totalPengaduan = \App\Models\Pengaduan::count();
    $totalSurat = \App\Models\PengajuanSurat::count();
    $totalPenerimaBantuan = \App\Models\PenerimaBantuan::count();

    // Recent activities - bisa diambil dari pengaduan atau surat terbaru
    $recentPengaduan = \App\Models\Pengaduan::latest()->take(5)->get();
    $recentSurat = \App\Models\PengajuanSurat::latest()->take(5)->get();

    return view('dashboard', compact(
        'totalUsers',
        'totalPengaduan',
        'totalSurat',
        'totalPenerimaBantuan',
        'recentPengaduan',
        'recentSurat'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
