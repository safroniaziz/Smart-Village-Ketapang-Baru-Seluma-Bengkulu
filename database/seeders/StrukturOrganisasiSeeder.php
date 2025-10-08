<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StrukturOrganisasi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class StrukturOrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Copy existing photos to storage
        $this->copyPhotosToStorage();

        // Clear existing data
        StrukturOrganisasi::query()->forceDelete();

        // PEMERINTAHAN DESA DATA

        // 1. Kepala Desa (Root)
        $kepalaDesa = StrukturOrganisasi::create([
            'nama' => 'Zultan Alhara',
            'jabatan' => 'Kepala Desa',
            'foto' => 'struktur/zultan.jpg',
            'tugas' => [
                'Menyelenggarakan pemerintahan desa',
                'Melaksanakan pembangunan desa',
                'Pembinaan kemasyarakatan desa',
                'Pemberdayaan masyarakat desa'
            ],
            'wewenang' => [
                'Memimpin penyelenggaraan pemerintahan desa',
                'Mengangkat dan memberhentikan perangkat desa',
                'Memegang kekuasaan pengelolaan keuangan dan aset desa',
                'Menetapkan peraturan desa'
            ],
            'parent_id' => null,
            'urutan' => 1,
            'kategori' => 'pemerintahan',
            'level' => 'kepala',
            'aktif' => true,
        ]);

        // 2. Sekretaris Desa (Under Kepala Desa)
        $sekretaris = StrukturOrganisasi::create([
            'nama' => 'Merianto',
            'jabatan' => 'Sekretaris Desa',
            'foto' => 'struktur/merianto.jpg',
            'tugas' => [
                'Melaksanakan urusan ketatausahaan',
                'Melaksanakan urusan umum',
                'Melaksanakan urusan keuangan',
                'Melaksanakan urusan perencanaan'
            ],
            'wewenang' => [
                'Membantu kepala desa dalam bidang administrasi pemerintahan',
                'Melaksanakan koordinasi dengan perangkat desa',
                'Melaksanakan tugas lain yang diberikan kepala desa'
            ],
            'parent_id' => $kepalaDesa->id,
            'urutan' => 1,
            'kategori' => 'pemerintahan',
            'level' => 'sekretaris',
            'aktif' => true,
        ]);

        // 3. Kaur Keuangan (Under Sekretaris)
        StrukturOrganisasi::create([
            'nama' => 'Sapta Adi',
            'jabatan' => 'Kaur Keuangan',
            'foto' => 'struktur/sapta.jpg',
            'tugas' => [
                'Melaksanakan pengelolaan APBDes',
                'Melaksanakan pencatatan keuangan desa',
                'Menyusun laporan keuangan desa',
                'Melaksanakan verifikasi administrasi keuangan'
            ],
            'wewenang' => [
                'Mengelola administrasi keuangan desa',
                'Melakukan verifikasi dokumen keuangan',
                'Menyusun rancangan APBDes'
            ],
            'parent_id' => $sekretaris->id,
            'urutan' => 1,
            'kategori' => 'pemerintahan',
            'level' => 'kasi_kaur',
            'aktif' => true,
        ]);

        // 4. Kaur Perencanaan (Under Sekretaris)
        StrukturOrganisasi::create([
            'nama' => 'Marlan',
            'jabatan' => 'Kaur Perencanaan',
            'foto' => 'struktur/marlan.jpg',
            'tugas' => [
                'Menyusun perencanaan pembangunan desa',
                'Melaksanakan monitoring dan evaluasi program',
                'Menginventarisasi data dalam rangka pembangunan',
                'Melaksanakan penyusunan laporan'
            ],
            'wewenang' => [
                'Menyusun rencana kerja pemerintah desa',
                'Melakukan koordinasi perencanaan pembangunan',
                'Melaksanakan monitoring pelaksanaan program'
            ],
            'parent_id' => $sekretaris->id,
            'urutan' => 2,
            'kategori' => 'pemerintahan',
            'level' => 'kasi_kaur',
            'aktif' => true,
        ]);

        // 5. Kasi Pemerintahan (Under Sekretaris)
        StrukturOrganisasi::create([
            'nama' => 'Desmerti',
            'jabatan' => 'Kasi Pemerintahan',
            'foto' => 'struktur/desmerti.jpg',
            'tugas' => [
                'Melaksanakan manajemen tata praja pemerintahan',
                'Menyusun produk hukum desa',
                'Melaksanakan pembinaan masalah pertanahan',
                'Melaksanakan pembinaan ketentraman dan ketertiban'
            ],
            'wewenang' => [
                'Melakukan pembinaan bidang pemerintahan',
                'Melaksanakan urusan kependudukan',
                'Melakukan koordinasi keamanan dan ketertiban'
            ],
            'parent_id' => $sekretaris->id,
            'urutan' => 3,
            'kategori' => 'pemerintahan',
            'level' => 'kasi_kaur',
            'aktif' => true,
        ]);

        // 6. Kasi Kesejahteraan (Under Sekretaris)
        StrukturOrganisasi::create([
            'nama' => 'Rozi',
            'jabatan' => 'Kasi Kesejahteraan',
            'foto' => 'struktur/rozi.jpg',
            'tugas' => [
                'Melaksanakan pembangunan sarana prasarana desa',
                'Melaksanakan pembinaan usaha ekonomi produktif',
                'Melaksanakan pembinaan sosial budaya masyarakat',
                'Melaksanakan pembinaan lingkungan hidup'
            ],
            'wewenang' => [
                'Melakukan pembinaan bidang kesejahteraan',
                'Melaksanakan pembinaan ekonomi masyarakat',
                'Melakukan koordinasi pembangunan infrastruktur'
            ],
            'parent_id' => $sekretaris->id,
            'urutan' => 4,
            'kategori' => 'pemerintahan',
            'level' => 'kasi_kaur',
            'aktif' => true,
        ]);

        // 7-9. Kepala Dusun (Under Kepala Desa, parallel with Sekretaris)
        StrukturOrganisasi::create([
            'nama' => 'Ajasseriani',
            'jabatan' => 'Kepala Dusun 1',
            'foto' => 'struktur/ajasseriani.jpg',
            'tugas' => [
                'Melaksanakan pembinaan ketentraman dan ketertiban wilayah',
                'Melaksanakan pembinaan partisipasi masyarakat',
                'Melaksanakan pembinaan gotong royong',
                'Melaksanakan koordinasi pelaksanaan tugas dusun'
            ],
            'wewenang' => [
                'Membantu kepala desa dalam wilayah kerjanya',
                'Melakukan pembinaan masyarakat dusun',
                'Melakukan koordinasi dengan RT/RW'
            ],
            'parent_id' => $kepalaDesa->id,
            'urutan' => 2,
            'kategori' => 'pemerintahan',
            'level' => 'kadus',
            'aktif' => true,
        ]);

        StrukturOrganisasi::create([
            'nama' => 'Meri',
            'jabatan' => 'Kepala Dusun 2',
            'foto' => 'struktur/meri.jpg',
            'tugas' => [
                'Melaksanakan pembinaan ketentraman dan ketertiban wilayah',
                'Melaksanakan pembinaan partisipasi masyarakat',
                'Melaksanakan pembinaan gotong royong',
                'Melaksanakan koordinasi pelaksanaan tugas dusun'
            ],
            'wewenang' => [
                'Membantu kepala desa dalam wilayah kerjanya',
                'Melakukan pembinaan masyarakat dusun',
                'Melakukan koordinasi dengan RT/RW'
            ],
            'parent_id' => $kepalaDesa->id,
            'urutan' => 3,
            'kategori' => 'pemerintahan',
            'level' => 'kadus',
            'aktif' => true,
        ]);

        StrukturOrganisasi::create([
            'nama' => 'Basri',
            'jabatan' => 'Kepala Dusun 3',
            'foto' => 'struktur/basri.jpg',
            'tugas' => [
                'Melaksanakan pembinaan ketentraman dan ketertiban wilayah',
                'Melaksanakan pembinaan partisipasi masyarakat',
                'Melaksanakan pembinaan gotong royong',
                'Melaksanakan koordinasi pelaksanaan tugas dusun'
            ],
            'wewenang' => [
                'Membantu kepala desa dalam wilayah kerjanya',
                'Melakukan pembinaan masyarakat dusun',
                'Melakukan koordinasi dengan RT/RW'
            ],
            'parent_id' => $kepalaDesa->id,
            'urutan' => 4,
            'kategori' => 'pemerintahan',
            'level' => 'kadus',
            'aktif' => true,
        ]);

        // BPD DATA (Separate hierarchy)

        // 1. Ketua BPD (Root for BPD)
        $ketuaBpd = StrukturOrganisasi::create([
            'nama' => 'Bahirman',
            'jabatan' => 'Ketua BPD',
            'foto' => 'struktur/bahirman.jpg',
            'tugas' => [
                'Membahas dan menyepakati rancangan peraturan desa',
                'Menampung dan menyalurkan aspirasi masyarakat desa',
                'Melakukan pengawasan kinerja kepala desa',
                'Melakukan evaluasi laporan penyelenggaraan pemerintahan desa'
            ],
            'wewenang' => [
                'Mengawasi pelaksanaan peraturan desa dan peraturan kepala desa',
                'Mengajukan rancangan peraturan desa',
                'Menggali, menampung, menghimpun, merumuskan dan menyalurkan aspirasi masyarakat'
            ],
            'parent_id' => null,
            'urutan' => 1,
            'kategori' => 'bpd',
            'level' => 'kepala',
            'aktif' => true,
        ]);

        // 2. Wakil Ketua BPD (Under Ketua BPD)
        StrukturOrganisasi::create([
            'nama' => 'Halintarman',
            'jabatan' => 'Wakil Ketua BPD',
            'foto' => 'struktur/halintarman.jpg',
            'tugas' => [
                'Membantu ketua BPD dalam melaksanakan tugasnya',
                'Menggantikan ketua BPD apabila berhalangan',
                'Melakukan koordinasi dengan anggota BPD lainnya'
            ],
            'wewenang' => [
                'Membantu ketua dalam memimpin rapat BPD',
                'Melakukan representasi BPD dalam forum tertentu',
                'Melaksanakan tugas yang didelegasikan ketua'
            ],
            'parent_id' => $ketuaBpd->id,
            'urutan' => 1,
            'kategori' => 'bpd',
            'level' => 'wakil',
            'aktif' => true,
        ]);

        // 3. Sekretaris BPD (Under Ketua BPD)
        StrukturOrganisasi::create([
            'nama' => 'Dhesty',
            'jabatan' => 'Sekretaris BPD',
            'foto' => 'struktur/dhesty.jpg',
            'tugas' => [
                'Melaksanakan administrasi BPD',
                'Menyusun agenda rapat dan notulensi',
                'Melakukan koordinasi administratif',
                'Menyusun laporan kegiatan BPD'
            ],
            'wewenang' => [
                'Mengelola administrasi dan kesekretariatan BPD',
                'Menyusun program kerja BPD',
                'Melakukan koordinasi administratif dengan pemerintah desa'
            ],
            'parent_id' => $ketuaBpd->id,
            'urutan' => 2,
            'kategori' => 'bpd',
            'level' => 'sekretaris',
            'aktif' => true,
        ]);

        // 4-5. Anggota BPD (Under Ketua BPD)
        StrukturOrganisasi::create([
            'nama' => 'Kebat',
            'jabatan' => 'Anggota BPD',
            'foto' => 'struktur/kebat.jpg',
            'tugas' => [
                'Menghadiri dan berpartisipasi dalam rapat BPD',
                'Menyerap aspirasi masyarakat di wilayah kerjanya',
                'Melakukan sosialisasi peraturan desa',
                'Membantu pengawasan pembangunan desa'
            ],
            'wewenang' => [
                'Mengajukan usulan rancangan peraturan desa',
                'Memberikan masukan dalam penyusunan kebijakan desa',
                'Melakukan pengawasan terhadap pelaksanaan peraturan desa'
            ],
            'parent_id' => $ketuaBpd->id,
            'urutan' => 3,
            'kategori' => 'bpd',
            'level' => 'anggota',
            'aktif' => true,
        ]);

        StrukturOrganisasi::create([
            'nama' => 'Susti',
            'jabatan' => 'Anggota BPD',
            'foto' => 'struktur/susti.jpg',
            'tugas' => [
                'Menghadiri dan berpartisipasi dalam rapat BPD',
                'Menyerap aspirasi masyarakat di wilayah kerjanya',
                'Melakukan sosialisasi peraturan desa',
                'Membantu pengawasan pembangunan desa'
            ],
            'wewenang' => [
                'Mengajukan usulan rancangan peraturan desa',
                'Memberikan masukan dalam penyusunan kebijakan desa',
                'Melakukan pengawasan terhadap pelaksanaan peraturan desa'
            ],
            'parent_id' => $ketuaBpd->id,
            'urutan' => 4,
            'kategori' => 'bpd',
            'level' => 'anggota',
            'aktif' => true,
        ]);

        $this->command->info('Struktur Organisasi seeder completed successfully!');
    }

    /**
     * Copy existing photos from public to storage
     */
    private function copyPhotosToStorage()
    {
        $publicPath = public_path('images/struktur');
        $storagePath = storage_path('app/public/struktur');

        // Create storage directory if not exists
        if (!File::exists($storagePath)) {
            File::makeDirectory($storagePath, 0755, true);
        }

        // Copy all jpg and png files
        $files = File::glob($publicPath . '/*.{jpg,jpeg,png}', GLOB_BRACE);

        foreach ($files as $file) {
            $fileName = basename($file);
            $destinationPath = $storagePath . '/' . $fileName;

            if (!File::exists($destinationPath)) {
                File::copy($file, $destinationPath);
                $this->command->info("Copied: {$fileName}");
            }
        }
    }
}
