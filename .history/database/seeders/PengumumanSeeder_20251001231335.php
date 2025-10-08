<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class Pengumum                'prioritas' => 'Rendah',
                'published' => true,
                'tanggal_publikasi' => now()->subWeek(),
                'tanggal_berakhir' => now()->addMonths(2),
                'views' => 678,eder extends Seeder
{
    public function run(): void
    {
        $pengumumans = [
            [
                'judul' => 'Pendaftaran Bantuan Langsung Tunai (BLT) Tahap IV',
                'konten' => '<p>Diberitahukan kepada seluruh warga Desa Ketapang Baru bahwa pendaftaran Bantuan Langsung Tunai (BLT) tahap IV telah dibuka mulai tanggal 1 Oktober 2024.</p>

<p><strong>Syarat pendaftaran:</strong></p>
<ul>
<li>KTP Desa Ketapang Baru yang masih berlaku</li>
<li>Kartu Keluarga (KK) asli dan fotocopy</li>
<li>Surat Keterangan Tidak Mampu (SKTM) dari RT/RW</li>
<li>Tidak sedang menerima bantuan sosial lainnya</li>
</ul>

<p><strong>Tempat dan Waktu Pendaftaran:</strong></p>
<p>Balai Desa Ketapang Baru<br>
Setiap hari Senin - Jumat<br>
Pukul 08.00 - 15.00 WIB</p>

<p>Batas akhir pendaftaran: <strong>31 Oktober 2024</strong></p>

<p>Untuk informasi lebih lanjut, silakan hubungi kantor desa di nomor (0736) 123456 atau datang langsung ke kantor desa.</p>',
                'prioritas' => 'Tinggi',
                'published' => true,
                'tanggal_publikasi' => now()->subDays(1),
                'tanggal_berakhir' => now()->addMonth(),
                'views' => 567,
            ],
            [
                'judul' => 'Pelayanan Administrasi Desa Libur Hari Raya Idul Fitri',
                'konten' => '<p>Diberitahukan kepada seluruh masyarakat Desa Ketapang Baru bahwa pelayanan administrasi desa akan libur pada tanggal:</p>

<p><strong>10 - 14 April 2024</strong> (Hari Raya Idul Fitri 1445 H)</p>

<p>Pelayanan administrasi akan kembali normal pada:</p>
<p><strong>Senin, 15 April 2024</strong></p>

<p>Untuk keperluan mendesak, silakan hubungi:</p>
<ul>
<li>Kepala Desa: 0812-3456-7890</li>
<li>Sekretaris Desa: 0813-4567-8901</li>
</ul>

<p>Mohon maaf atas ketidaknyamanan ini. Selamat Hari Raya Idul Fitri, mohon maaf lahir dan batin.</p>',
                'prioritas' => 'Sedang',
                'published' => true,
                'tanggal_publikasi' => now()->subDays(3),
                'tanggal_berakhir' => now()->addWeeks(2),
                'views' => 234,
            ],
            [
                'judul' => 'Gotong Royong Pembersihan Saluran Air Minggu Depan',
                'konten' => '<p>Mengingat akan memasuki musim hujan, Pemerintah Desa Ketapang Baru mengajak seluruh warga untuk berpartisipasi dalam kegiatan gotong royong pembersihan saluran air.</p>

<p><strong>Hari/Tanggal:</strong> Minggu, 6 Oktober 2024<br>
<strong>Waktu:</strong> 07.00 - 11.00 WIB<br>
<strong>Tempat:</strong> Seluruh wilayah desa (sesuai pembagian RT)</p>

<p><strong>Yang perlu dibawa:</strong></p>
<ul>
<li>Cangkul, sabit, atau alat pembersih lainnya</li>
<li>Sarung tangan</li>
<li>Masker</li>
</ul>

<p>Setelah kegiatan gotong royong, akan ada makan bersama di balai desa yang telah disiapkan oleh panitia.</p>

<p>Mari bersama-sama menjaga kebersihan lingkungan desa kita. Partisipasi Bapak/Ibu sangat diharapkan.</p>',
                'prioritas' => 'Sedang',
                'published' => true,
                'tanggal_publikasi' => now()->subDays(4),
                'tanggal_berakhir' => now()->addDays(3),
                'views' => 189,
            ],
            [
                'judul' => 'Pemadaman Listrik Terjadwal PLN Area Ketapang Baru',
                'konten' => '<p>Diberitahukan kepada seluruh warga Desa Ketapang Baru bahwa PLN akan melakukan pemadaman listrik terjadwal untuk keperluan pemeliharaan jaringan.</p>

<p><strong>Hari/Tanggal:</strong> Sabtu, 5 Oktober 2024<br>
<strong>Waktu:</strong> 08.00 - 16.00 WIB<br>
<strong>Area:</strong> Seluruh wilayah Desa Ketapang Baru</p>

<p><strong>Tujuan pemadaman:</strong></p>
<ul>
<li>Pemeliharaan rutin jaringan distribusi</li>
<li>Penggantian peralatan yang sudah tidak layak</li>
<li>Peningkatan kualitas pelayanan listrik</li>
</ul>

<p>Mohon persiapkan diri dengan:</p>
<ul>
<li>Menyiapkan lampu darurat atau lilin</li>
<li>Mengisi daya perangkat elektronik sebelumnya</li>
<li>Menyiapkan air bersih secukupnya</li>
</ul>

<p>Untuk informasi lebih lanjut, hubungi PLN Call Center: 123 atau kantor PLN terdekat.</p>',
                'prioritas' => 'Tinggi',
                'published' => true,
                'tanggal_publikasi' => now()->subDays(6),
                'tanggal_berakhir' => now()->addDays(1),
                'views' => 445,
            ],
            [
                'judul' => 'Pembagian Sertifikat Tanah Program PTSL Batch 3',
                'konten' => '<p>Kepada warga yang telah mendaftarkan tanahnya dalam Program Pendaftaran Tanah Sistematis Lengkap (PTSL) Batch 3, diberitahukan bahwa sertifikat tanah sudah dapat diambil.</p>

<p><strong>Waktu pengambilan:</strong><br>
Senin - Kamis: 08.00 - 15.00 WIB<br>
Jumat: 08.00 - 11.00 WIB</p>

<p><strong>Tempat:</strong> Kantor Desa Ketapang Baru</p>

<p><strong>Dokumen yang harus dibawa:</strong></p>
<ul>
<li>KTP asli pemilik tanah</li>
<li>Kartu Keluarga (KK) asli</li>
<li>Bukti pendaftaran PTSL</li>
<li>Materai 10.000 sebanyak 2 lembar</li>
</ul>

<p><strong>Catatan penting:</strong></p>
<ul>
<li>Sertifikat hanya dapat diambil oleh pemilik tanah yang bersangkutan</li>
<li>Jika berhalangan hadir, dapat diwakilkan dengan surat kuasa bermaterai</li>
<li>Batas waktu pengambilan: 31 Desember 2024</li>
</ul>',
                'prioritas' => 'Tinggi',
                'tanggal_publikasi' => now()->subWeek(),
                'tanggal_berakhir' => now()->addMonths(2),
                'views' => 678,
            ],
            [
                'judul' => 'Pelatihan Keterampilan Ibu-ibu PKK Desa',
                'konten' => '<p>PKK Desa Ketapang Baru akan mengadakan pelatihan keterampilan untuk seluruh ibu-ibu anggota PKK dan masyarakat umum.</p>

<p><strong>Jenis pelatihan:</strong></p>
<ul>
<li>Membuat kerajinan tangan dari barang bekas</li>
<li>Kue kering dan basah untuk usaha</li>
<li>Budidaya tanaman hias</li>
<li>Pengolahan hasil pertanian</li>
</ul>

<p><strong>Waktu pelaksanaan:</strong><br>
Selasa - Kamis, 8-10 Oktober 2024<br>
Pukul 09.00 - 15.00 WIB</p>

<p><strong>Tempat:</strong> Balai Desa Ketapang Baru</p>

<p><strong>Pendaftaran:</strong></p>
<p>Silakan daftar ke Ketua RT masing-masing atau langsung ke Ketua PKK Desa (Ibu Sari - 0812-1234-5678)</p>

<p>Pelatihan ini GRATIS dan akan mendapat sertifikat serta starter kit untuk memulai usaha.</p>',
                'prioritas' => 'Sedang',
                'published' => true,
                'tanggal_publikasi' => now()->subWeeks(2),
                'tanggal_berakhir' => now()->addDays(5),
                'views' => 312,
            ]
        ];

        foreach ($pengumumans as $pengumuman) {
            Pengumuman::create($pengumuman);
        }
    }
}
