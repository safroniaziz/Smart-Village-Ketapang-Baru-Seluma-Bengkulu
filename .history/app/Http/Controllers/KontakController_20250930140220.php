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

        // Default values
        $mapUrl = null;
        $embedStreetViewMapUrl = null;
        $streetViewUrl = $monografi->google_street_view_url ?? null;

        // 1) If Street View URL exists, derive embed from it and DO NOT fallback to lat/lng map
        if ($streetViewUrl) {
            // Try to extract lat,lng from "@lat,lng" pattern
            if (preg_match('/@\s*(-?\d+\.?\d*),\s*(-?\d+\.?\d*)/i', $streetViewUrl, $m)) {
                $svLat = $m[1];
                $svLng = $m[2];
                $embedStreetViewMapUrl = "https://www.google.com/maps?q={$svLat},{$svLng}&hl=id&z=18&output=embed";
            } else {
                // Try alternative pattern: "/place/.../data=!3m.*!4d<lng>!3d<lat>"
                if (preg_match('/!3d(-?\d+\.?\d*)!4d(-?\d+\.?\d*)/i', $streetViewUrl, $m2)) {
                    $svLat = $m2[1];
                    $svLng = $m2[2];
                    $embedStreetViewMapUrl = "https://www.google.com/maps?q={$svLat},{$svLng}&hl=id&z=18&output=embed";
                }
            }
            // No lat/lng fallback when Street View URL exists; user prefers this source
        } else {
            // 2) Otherwise fallback to lat/lng from monografi or kontak
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
