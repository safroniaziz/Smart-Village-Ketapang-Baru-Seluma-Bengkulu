<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
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
Route::get('/data-warga', [HomeController::class, 'dataWarga'])->name('data.warga');

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
        'nomor_tracking' => PengajuanSurat::generateTrackingNumber(),
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
        . "Tracking: {$pengajuan->nomor_tracking}\n"
        . "Nama: {$pengajuan->nama_lengkap}\n"
        . "Jenis: {$pengajuan->jenis_surat}\n"
        . "Waktu: " . now()->toDateTimeString();
    $fonnte->send(config('services.kades_wa'), $message);

    return response()->json([
        'success' => true,
        'message' => 'Pengajuan surat berhasil dikirim! Simpan nomor tracking Anda.',
        'tracking_number' => $pengajuan->nomor_tracking,
    ]);
})->name('surat.online.store');

// Debug routes removed

// Contact Route
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');

// Dashboard (Breeze)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
