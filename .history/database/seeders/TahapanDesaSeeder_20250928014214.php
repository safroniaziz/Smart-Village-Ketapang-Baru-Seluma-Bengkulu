<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TahapanDesa;

class TahapanDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tahapanData = [
            [
                'nama_tahapan' => 'Perencanaan Partisipatif',
                'deskripsi' => 'Tahap awal yang melibatkan seluruh stakeholder dalam mengidentifikasi kebutuhan dan prioritas pembangunan desa.',
                'kegiatan' => 'Musyawarah desa, survey kebutuhan masyarakat, analisis potensi dan masalah, penyusunan dokumen perencanaan',
                'waktu' => '3-6 bulan',
                'icon' => 'fas fa-clipboard-list',
                'is_active' => true
            ],
            [
                'nama_tahapan' => 'Mobilisasi Sumber Daya',
                'deskripsi' => 'Mengumpulkan dan mengalokasikan sumber daya yang diperlukan untuk melaksanakan program pembangunan.',
                'kegiatan' => 'Penggalian dana, rekrutmen tenaga kerja, pengadaan material, koordinasi dengan pihak terkait',
                'waktu' => '2-4 bulan',
                'icon' => 'fas fa-tools',
                'is_active' => true
            ],
            [
                'nama_tahapan' => 'Implementasi Program',
                'deskripsi' => 'Pelaksanaan program pembangunan sesuai dengan rencana yang telah disusun dengan melibatkan masyarakat.',
                'kegiatan' => 'Konstruksi infrastruktur, pelatihan masyarakat, pengembangan UMKM, program pemberdayaan',
                'waktu' => '6-12 bulan',
                'icon' => 'fas fa-hammer',
                'is_active' => true
            ],
            [
                'nama_tahapan' => 'Monitoring dan Evaluasi',
                'deskripsi' => 'Pemantauan berkelanjutan terhadap pelaksanaan program dan evaluasi dampak yang dihasilkan.',
                'kegiatan' => 'Pengumpulan data, analisis kinerja, evaluasi dampak, penyusunan laporan, perbaikan program',
                'waktu' => 'Berkelanjutan',
                'icon' => 'fas fa-chart-line',
                'is_active' => true
            ],
            [
                'nama_tahapan' => 'Pemeliharaan dan Pengembangan',
                'deskripsi' => 'Memastikan keberlanjutan program dan pengembangan lebih lanjut berdasarkan hasil evaluasi.',
                'kegiatan' => 'Pemeliharaan infrastruktur, pengembangan program lanjutan, replikasi keberhasilan, peningkatan kapasitas',
                'waktu' => 'Berkelanjutan',
                'icon' => 'fas fa-sync-alt',
                'is_active' => true
            ]
        ];

        foreach ($tahapanData as $tahapan) {
            TahapanDesa::create($tahapan);
        }
    }
}