<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\MonografiDesa;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::getKontakUtama();

        // Jika tidak ada data kontak, buat data default
        if (!$kontak) {
            $kontak = new Kontak([
                'nama_desa' => 'Desa Ketapang Baru',
                'alamat' => 'Jl. Raya Ketapang Baru No. 1, Kecamatan Ketapang, Kabupaten Ketapang, Kalimantan Barat',
                'kode_pos' => '78872',
                'telepon' => '(0534) 1234567',
                'email' => 'desa.ketapangbaru@gmail.com',
                'website' => 'https://ketapangbaru.desa.id',
                'kepala_desa' => 'Budi Santoso, S.Pd',
                'sekretaris_desa' => 'Siti Aminah, S.E',
                'bendahara_desa' => 'Ahmad Wijaya, S.Pd',
                'jam_operasional' => [
                    'senin' => '08:00 - 16:00',
                    'selasa' => '08:00 - 16:00',
                    'rabu' => '08:00 - 16:00',
                    'kamis' => '08:00 - 16:00',
                    'jumat' => '08:00 - 16:00',
                    'sabtu' => '08:00 - 12:00',
                    'minggu' => 'Tutup'
                ],
                'latitude' => '-1.8312',
                'longitude' => '109.9811',
                'deskripsi' => 'Desa Ketapang Baru adalah desa yang terletak di Kecamatan Ketapang, Kabupaten Ketapang, Provinsi Kalimantan Barat. Desa ini memiliki potensi alam yang melimpah dan masyarakat yang ramah.',
                'aktif' => true
            ]);
        }

        $monografi = MonografiDesa::first();

        // Tentukan URL peta: prioritas street view, lalu embed maps dari koordinat
        $mapUrl = null;
        if ($monografi && !empty($monografi->google_street_view_url)) {
            $mapUrl = $monografi->google_street_view_url;
        } elseif ($monografi && $monografi->latitude && $monografi->longitude) {
            $lat = $monografi->latitude;
            $lng = $monografi->longitude;
            $mapUrl = "https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d0!2d{$lng}!3d{$lat}!2m3!1f0!2f0!3f0!3m2!1sid!2sid!4v" . time();
        } elseif ($kontak->latitude && $kontak->longitude) {
            $lat = $kontak->latitude;
            $lng = $kontak->longitude;
            $mapUrl = "https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d0!2d{$lng}!3d{$lat}!2m3!1f0!2f0!3f0!3m2!1sid!2sid!4v" . time();
        }

        return view('pages.kontak', [
            'kontak' => $kontak,
            'monografi' => $monografi,
            'mapUrl' => $mapUrl,
        ]);
    }
}
