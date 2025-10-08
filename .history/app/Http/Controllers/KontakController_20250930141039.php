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

        $mapUrl = null;
        $embedStreetViewMapUrl = null;
        $streetViewUrl = $monografi->google_street_view_url ?? null;

        if ($streetViewUrl) {
            // If admin stored the full embeddable Street View URL, use it directly
            if (stripos($streetViewUrl, '/maps/embed?pb=') !== false) {
                $embedStreetViewMapUrl = $streetViewUrl;
            } else {
                // Derive a Street View embed using cbll (coordinates)
                $svLat = null; $svLng = null;
                if (preg_match('/@\s*(-?\d+\.?\d*),\s*(-?\d+\.?\d*)/i', $streetViewUrl, $m)) {
                    $svLat = $m[1];
                    $svLng = $m[2];
                }
                if ((!$svLat || !$svLng) && preg_match('/!3d(-?\d+\.?\d*)!4d(-?\d+\.?\d*)/i', $streetViewUrl, $m2)) {
                    $svLat = $m2[1];
                    $svLng = $m2[2];
                }
                if ((!$svLat || !$svLng) && $monografi && $monografi->latitude && $monografi->longitude) {
                    $svLat = $monografi->latitude;
                    $svLng = $monografi->longitude;
                }
                if ((!$svLat || !$svLng) && $kontak->latitude && $kontak->longitude) {
                    $svLat = $kontak->latitude;
                    $svLng = $kontak->longitude;
                }
                if ($svLat && $svLng) {
                    $embedStreetViewMapUrl = "https://maps.google.com/maps?layer=c&cbll={$svLat},{$svLng}&hl=id&output=embed";
                }
            }
        } else {
            // Fallback to normal map embed from lat/lng
            if ($monografi && $monografi->latitude && $monografi->longitude) {
                $lat = $monografi->latitude;
                $lng = $monografi->longitude;
                $mapUrl = "https://www.google.com/maps?q={$lat},{$lng}&hl=id&z=17&output=embed";
            } elseif ($kontak->latitude && $kontak->longitude) {
                $lat = $kontak->latitude;
                $lng = $kontak->longitude;
                $mapUrl = "https://www.google.com/maps?q={$lat},{$lng}&hl=id&z=17&output=embed";
            }
        }

        return view('pages.kontak', [
            'kontak' => $kontak,
            'monografi' => $monografi,
            'mapUrl' => $mapUrl,
            'embedStreetViewMapUrl' => $embedStreetViewMapUrl,
        ]);
    }
}

