# CRUD Manajemen Visi Misi Desa

## Overview
Sistem CRUD untuk manajemen visi misi desa yang telah dibuat dengan style yang sama seperti halaman data warga. Sistem ini memungkinkan admin untuk mengelola:

1. **Visi Desa** - Visi dan deskripsi desa
2. **Misi Desa** - Misi, deskripsi, dan indikator pencapaian
3. **Pendekatan Partisipatif** - Pendekatan dan strategi pembangunan
4. **Tahapan Implementasi** - Tahapan dan kegiatan pembangunan

## Fitur Utama

### 1. Halaman Admin Utama
- **URL**: `/admin/visi-misi`
- **Layout**: Tab-based interface dengan 4 tab
- **Style**: Menggunakan style yang sama dengan halaman data warga
- **Statistics Cards**: Menampilkan jumlah data untuk setiap kategori

### 2. CRUD Operations
Setiap kategori memiliki operasi CRUD lengkap:
- ✅ **Create** - Tambah data baru
- ✅ **Read** - Lihat daftar data
- ✅ **Update** - Edit data existing
- ✅ **Delete** - Hapus data

### 3. Modal Forms
- Modal popup untuk create/edit
- Validasi form real-time
- SweetAlert2 untuk konfirmasi
- Loading states

### 4. Responsive Design
- Mobile-friendly
- Table responsive
- Button actions yang optimal untuk mobile

## File Structure

```
resources/views/admin/visi-misi/
├── index.blade.php                    # Halaman utama admin
└── partials/
    ├── visi-table-content.blade.php   # Tabel content visi
    ├── misi-table-content.blade.php   # Tabel content misi
    ├── pendekatan-table-content.blade.php # Tabel content pendekatan
    ├── tahapan-table-content.blade.php    # Tabel content tahapan
    ├── visi-modal.blade.php          # Modal form visi
    ├── misi-modal.blade.php          # Modal form misi
    ├── pendekatan-modal.blade.php    # Modal form pendekatan
    └── tahapan-modal.blade.php       # Modal form tahapan
```

## Routes

```php
// Admin main page
Route::get('admin/visi-misi', [VisiMisiController::class, 'index'])->name('admin.visi-misi.index');

// Visi CRUD
Route::get('visi-misi/visi', [VisiMisiController::class, 'indexVisi']);
Route::post('visi-misi/visi', [VisiMisiController::class, 'storeVisi']);
Route::get('visi-misi/visi/{id}/edit', [VisiMisiController::class, 'editVisi']);
Route::put('visi-misi/visi/{id}', [VisiMisiController::class, 'updateVisi']);
Route::delete('visi-misi/visi/{id}', [VisiMisiController::class, 'destroyVisi']);

// Misi CRUD
Route::get('visi-misi/misi', [VisiMisiController::class, 'indexMisi']);
Route::post('visi-misi/misi', [VisiMisiController::class, 'storeMisi']);
Route::get('visi-misi/misi/{id}/edit', [VisiMisiController::class, 'editMisi']);
Route::put('visi-misi/misi/{id}', [VisiMisiController::class, 'updateMisi']);
Route::delete('visi-misi/misi/{id}', [VisiMisiController::class, 'destroyMisi']);

// Pendekatan CRUD
Route::get('visi-misi/pendekatan', [VisiMisiController::class, 'indexPendekatan']);
Route::post('visi-misi/pendekatan', [VisiMisiController::class, 'storePendekatan']);
Route::get('visi-misi/pendekatan/{id}/edit', [VisiMisiController::class, 'editPendekatan']);
Route::put('visi-misi/pendekatan/{id}', [VisiMisiController::class, 'updatePendekatan']);
Route::delete('visi-misi/pendekatan/{id}', [VisiMisiController::class, 'destroyPendekatan']);

// Tahapan CRUD
Route::get('visi-misi/tahapan', [VisiMisiController::class, 'indexTahapan']);
Route::post('visi-misi/tahapan', [VisiMisiController::class, 'storeTahapan']);
Route::get('visi-misi/tahapan/{id}/edit', [VisiMisiController::class, 'editTahapan']);
Route::put('visi-misi/tahapan/{id}', [VisiMisiController::class, 'updateTahapan']);
Route::delete('visi-misi/tahapan/{id}', [VisiMisiController::class, 'destroyTahapan']);
```

## Database Models

### VisiDesa
- `visi` (string, required)
- `deskripsi` (text, nullable)
- `deskripsi_section` (text, nullable)
- `pendekatan_deskripsi` (text, nullable)
- `is_active` (boolean, default: true)

### MisiDesa
- `judul` (string, required)
- `deskripsi` (text, required)
- `indikator` (text, nullable)
- `is_active` (boolean, default: true)

### PendekatanDesa
- `nama_pendekatan` (string, required)
- `deskripsi` (text, required)
- `strategi` (text, nullable)
- `icon` (string, nullable)
- `is_active` (boolean, default: true)

### TahapanDesa
- `nama_tahapan` (string, required)
- `deskripsi` (text, required)
- `kegiatan` (text, nullable)
- `waktu` (string, nullable)
- `icon` (string, nullable)
- `is_active` (boolean, default: true)

## JavaScript Features

### AJAX Operations
- Real-time data loading
- Form submission tanpa reload
- Dynamic table updates
- Error handling

### SweetAlert2 Integration
- Confirmation dialogs
- Success/error notifications
- Loading states

### Responsive Features
- Mobile-optimized buttons
- Collapsible table columns
- Touch-friendly interface

## Usage

### 1. Akses Halaman Admin
```
http://your-domain/admin/visi-misi
```

### 2. Tambah Data Baru
1. Klik tab yang diinginkan (Visi, Misi, Pendekatan, atau Tahapan)
2. Klik tombol "Tambah [Kategori]"
3. Isi form modal
4. Klik "Simpan"

### 3. Edit Data
1. Klik tombol "Edit" pada data yang ingin diedit
2. Form modal akan terbuka dengan data yang sudah terisi
3. Ubah data yang diperlukan
4. Klik "Update"

### 4. Hapus Data
1. Klik tombol "Hapus" pada data yang ingin dihapus
2. Konfirmasi penghapusan di dialog SweetAlert2
3. Data akan dihapus secara permanen

## Security Features

- CSRF Protection
- Input validation
- XSS protection
- SQL injection prevention

## Dependencies

- Laravel 10+
- Bootstrap 5
- jQuery
- SweetAlert2
- KTIcons

## Notes

- Semua operasi menggunakan AJAX untuk pengalaman yang smooth
- Data diurutkan berdasarkan `created_at` ascending
- Soft delete digunakan untuk semua model
- Status aktif dapat di-toggle untuk setiap data
