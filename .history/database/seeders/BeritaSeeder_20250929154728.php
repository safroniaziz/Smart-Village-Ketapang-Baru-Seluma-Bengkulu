<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $beritas = [
            [
                'judul' => 'Pembangunan Jalan Desa Ketapang Baru Tahap II Dimulai',
                'konten' => '<p>Desa Ketapang Baru kembali melanjutkan program pembangunan infrastruktur dengan dimulainya pembangunan jalan desa tahap II. Proyek ini merupakan kelanjutan dari pembangunan tahap I yang telah berhasil diselesaikan pada tahun lalu.</p>

<p>Kepala Desa Ketapang Baru, Bapak Ahmad Suryadi, menjelaskan bahwa pembangunan jalan tahap II ini akan menghubungkan wilayah RT 05 hingga RT 08 dengan panjang total 2,5 kilometer. "Pembangunan ini sangat penting untuk memperlancar akses warga ke pusat desa dan fasilitas umum lainnya," ujar Pak Ahmad.</p>

<p>Proyek yang dianggarkan sebesar Rp 850 juta ini diharapkan dapat selesai dalam waktu 4 bulan. Pembangunan dilakukan dengan menggunakan standar jalan kabupaten dengan lebar 4 meter dan menggunakan material berkualitas tinggi.</p>

<p>Warga sangat antusias menyambut pembangunan ini. "Alhamdulillah, akhirnya jalan di kampung kami akan diperbaiki. Selama ini kalau hujan sering becek dan sulit dilalui," kata Ibu Siti Aminah, salah satu warga RT 06.</p>',
                'featured' => true,
                'tanggal_publikasi' => now()->subDays(2),
                'views' => 245,
            ],
            [
                'judul' => 'Posyandu Balita Desa Raih Juara 1 Tingkat Kecamatan',
                'konten' => '<p>Posyandu Melati Desa Ketapang Baru berhasil meraih juara 1 dalam lomba posyandu tingkat kecamatan yang diselenggarakan oleh Puskesmas Ketapang pada bulan lalu.</p>

<p>Prestasi membanggakan ini diraih berkat kerja keras para kader posyandu yang dipimpin oleh Ibu Ratna Sari. Posyandu Melati dinilai unggul dalam hal kelengkapan data, inovasi program, dan tingkat partisipasi masyarakat.</p>

<p>"Kami sangat bangga dengan prestasi ini. Ini adalah hasil kerja sama yang baik antara kader posyandu, pemerintah desa, dan masyarakat," kata Ibu Ratna Sari.</p>

<p>Sebagai juara 1, Posyandu Melati mendapat hadiah berupa paket alat kesehatan senilai Rp 3 juta dan piagam penghargaan. Prestasi ini juga membuat Desa Ketapang Baru akan mewakili kecamatan dalam lomba posyandu tingkat kabupaten.</p>',
                'featured' => false,
                'tanggal_publikasi' => now()->subDays(5),
                'views' => 189,
            ],
            [
                'judul' => 'Program Pelatihan Pertanian Organik untuk Petani Desa',
                'konten' => '<p>Dinas Pertanian Kabupaten bekerja sama dengan Pemerintah Desa Ketapang Baru mengadakan program pelatihan pertanian organik untuk para petani desa. Pelatihan ini berlangsung selama 3 hari di Balai Desa.</p>

<p>Pelatihan yang diikuti oleh 45 petani ini mencakup materi tentang teknik budidaya organik, pembuatan pupuk kompos, pengendalian hama alami, dan pemasaran produk organik.</p>

<p>Narasumber pelatihan adalah Dr. Bambang Sutrisno dari Fakultas Pertanian Universitas Bengkulu dan praktisi pertanian organik berpengalaman.</p>

<p>"Pertanian organik adalah masa depan pertanian yang berkelanjutan. Dengan teknik yang tepat, hasil panen bisa meningkat dan ramah lingkungan," jelas Dr. Bambang.</p>

<p>Para petani sangat antusias mengikuti pelatihan ini. Pak Supardi, petani padi dari RT 03, mengatakan, "Pelatihan ini sangat bermanfaat. Kami jadi tahu cara bertani yang lebih baik dan sehat."</p>',
                'featured' => true,
                'tanggal_publikasi' => now()->subWeek(),
                'views' => 156,
            ],
            [
                'judul' => 'Festival Budaya Desa Ketapang Baru Meriahkan HUT RI ke-79',
                'konten' => '<p>Dalam rangka memeriahkan HUT RI ke-79, Desa Ketapang Baru menggelar Festival Budaya yang berlangsung meriah selama 3 hari di lapangan desa.</p>

<p>Festival ini menampilkan berbagai pertunjukan seni dan budaya lokal, seperti tari tradisional, musik daerah, dan pameran kerajinan tangan warga desa.</p>

<p>Acara dibuka langsung oleh Camat Ketapang yang didampingi oleh Kepala Desa dan tokoh masyarakat setempat. Dalam sambutannya, Pak Camat mengapresiasi semangat gotong royong masyarakat desa.</p>

<p>Selain pertunjukan seni, festival ini juga menggelar berbagai lomba seperti lomba masak tradisional, lomba kerajinan tangan, dan lomba foto dengan tema "Keindahan Desa Ketapang Baru".</p>

<p>Festival ini berhasil menarik pengunjung dari desa-desa tetangga dan mendapat apresiasi tinggi dari masyarakat.</p>',
                'featured' => false,
                'tanggal_publikasi' => now()->subWeeks(2),
                'views' => 298,
            ],
            [
                'judul' => 'Bantuan Bibit Tanaman untuk Program Penghijauan Desa',
                'konten' => '<p>Pemerintah Desa Ketapang Baru menerima bantuan 500 bibit tanaman dari Dinas Lingkungan Hidup Kabupaten untuk mendukung program penghijauan desa.</p>

<p>Bibit yang diterima terdiri dari berbagai jenis tanaman, antara lain mahoni, trembesi, mangga, dan rambutan. Bibit-bibit ini akan ditanam di sepanjang jalan desa dan area-area kosong yang telah disiapkan.</p>

<p>Kegiatan penanaman akan dilakukan secara gotong royong dengan melibatkan seluruh warga desa. Setiap RT akan mendapat jatah bibit sesuai dengan luas wilayahnya.</p>

<p>"Program penghijauan ini sangat penting untuk menjaga kelestarian lingkungan dan menciptakan udara yang lebih segar di desa kita," kata Kepala Desa.</p>

<p>Penanaman bibit akan dimulai pada minggu depan bersamaan dengan dimulainya musim hujan yang dinilai tepat untuk pertumbuhan tanaman.</p>',
                'featured' => false,
                'tanggal_publikasi' => now()->subWeeks(3),
                'views' => 134,
            ],
            [
                'judul' => 'Koperasi Desa Raih Omzet 2 Miliar di Tahun 2024',
                'konten' => '<p>Koperasi Desa Ketapang Baru berhasil mencatat prestasi membanggakan dengan meraih omzet sebesar Rp 2 miliar sepanjang tahun 2024. Pencapaian ini melampaui target yang ditetapkan sebesar Rp 1,8 miliar.</p>

<p>Ketua Koperasi, Bapak Hendri Wijaya, menjelaskan bahwa keberhasilan ini tidak lepas dari dukungan penuh masyarakat desa dan diversifikasi usaha yang dilakukan koperasi.</p>

<p>Koperasi yang didirikan pada tahun 2020 ini kini memiliki berbagai unit usaha, mulai dari simpan pinjam, toko sembako, hingga usaha penggilingan padi.</p>

<p>"Kami terus berinovasi untuk memberikan pelayanan terbaik kepada anggota dan masyarakat desa. Target tahun depan adalah mencapai omzet Rp 2,5 miliar," ujar Pak Hendri.</p>

<p>Saat ini koperasi memiliki 287 anggota dan terus bertambah setiap bulannya. Keberadaan koperasi sangat membantu perekonomian warga desa.</p>',
                'featured' => true,
                'tanggal_publikasi' => now()->subMonth(),
                'views' => 412,
            ]
        ];

        foreach ($beritas as $berita) {
            Berita::create($berita);
        }
    }
}
