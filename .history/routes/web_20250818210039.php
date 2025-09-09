<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Services\FonnteService;

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

// Debug endpoint to test WA send
Route::get('/debug/send-wa', function (Illuminate\Http\Request $request, FonnteService $fonnte) {
    // Only enforce secret in production
    if (app()->environment('production')) {
        $secret = env('DEBUG_WA_SECRET');
        if (!$secret || $request->query('key') !== $secret) {
            abort(403);
        }
    }
    $to = $request->query('to');
    $msg = $request->query('msg', 'Test WA dari Smart Village');
    $url = $request->query('url');
    $res = $fonnte->sendWithResponse((string)$to, (string)$msg, $url ? (string)$url : null);
    return response()->json($res);
});

// Debug endpoint to send to KADES_WA directly
Route::get('/debug/send-wa-kades', function (Illuminate\Http\Request $request, FonnteService $fonnte) {
    if (app()->environment('production')) {
        $secret = env('DEBUG_WA_SECRET');
        if (!$secret || $request->query('key') !== $secret) {
            abort(403);
        }
    }
    $to = env('KADES_WA');
    if (empty($to)) {
        return response()->json(['ok' => false, 'response' => 'KADES_WA not set in .env']);
    }
    $msg = $request->query('msg', 'Notifikasi uji coba ke Kades dari Smart Village');
    $url = $request->query('url');
    $res = $fonnte->sendWithResponse((string)$to, (string)$msg, $url ? (string)$url : null);
    return response()->json($res);
});

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
