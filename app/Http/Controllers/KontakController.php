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

        // If no contact data exists, return null to show empty state
        // Remove the fake data creation to properly show empty state
        // if (!$kontak) {
        //     $kontak = new Kontak([...]);
        // }

        $monografi = MonografiDesa::first();

        $mapUrl = null;
        $embedStreetViewMapUrl = null;
        $streetViewUrl = $monografi->google_street_view_url ?? null;

        // Only process map data if we have contact data
        if ($kontak) {
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
                // Default to the same Street View embed used on home page (no lat/long derivation)
                $embedStreetViewMapUrl = 'https://www.google.com/maps/embed?pb=!4v1734567890!6m8!1m7!1sPFCbe1x0vFzhf8kg4ySPRA!2m2!1d102.7635049!2d-4.3221828!3f82.05!4f10.82!5f0.7820865974627469!5e0!3m2!1sen!2sid!4v1734567890!5m2!1sen!2sid';
                $mapUrl = null; // force Street View preference on the view
            }

            // Force use of the same Street View embed as home page, per request (ignore lat/long and provided URLs)
            $embedStreetViewMapUrl = 'https://www.google.com/maps/embed?pb=!4v1734567890!6m8!1m7!1sPFCbe1x0vFzhf8kg4ySPRA!2m2!1d102.7635049!2d-4.3221828!3f82.05!4f10.82!5f0.7820865974627469!5e0!3m2!1sen!2sid!4v1734567890!5m2!1sen!2sid';
            $mapUrl = null;
        }

        return view('pages.kontak', [
            'kontak' => $kontak,
            'monografi' => $monografi,
            'mapUrl' => $mapUrl,
            'embedStreetViewMapUrl' => $embedStreetViewMapUrl,
        ]);
    }
}

