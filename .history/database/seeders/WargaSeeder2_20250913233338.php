<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WargaSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert data real dari gambar
        foreach ($realData as $data) {
            $bantuan = $data['bantuan'] ?? [];
            unset($data['bantuan']);

            $warga = Warga::create($data);

            // Buat record bantuan hanya jika ada data bantuan
            if (!empty($bantuan)) {
                foreach ($bantuan as $jenisBantuanItem) {
                    PenerimaBantuan::create([
                        'warga_id' => $warga->id,
                        'program' => $jenisBantuanItem,
                        'tahun' => 2023,
                        'nominal' => 1000000,
                        'status' => 'Aktif'
                    ]);
                }
            }
        }
    }
}
