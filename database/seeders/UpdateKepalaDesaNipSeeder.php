<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StrukturOrganisasi;

class UpdateKepalaDesaNipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update kepala desa dengan NIP default
        $kepalaDesa = StrukturOrganisasi::where('level', 'kepala')
            ->where('kategori', 'pemerintahan')
            ->first();

        if ($kepalaDesa) {
            // Set NIP default jika belum ada (hanya angka, tanpa label "NIP.")
            if (empty($kepalaDesa->nip)) {
                $kepalaDesa->update([
                    'nip' => '19800101 200604 1 001' // Format NIP standar sebagai contoh
                ]);
                
                $this->command->info('✅ NIP Kepala Desa berhasil diupdate: ' . $kepalaDesa->nama);
                $this->command->info('   NIP: ' . $kepalaDesa->nip);
                $this->command->warn('⚠️  Silakan ubah NIP ini melalui Admin Panel sesuai data sebenarnya');
            } else {
                $this->command->info('ℹ️  NIP Kepala Desa sudah ada: ' . $kepalaDesa->nip);
            }
        } else {
            $this->command->warn('⚠️  Data Kepala Desa tidak ditemukan');
            $this->command->info('💡 Pastikan sudah ada data dengan level=kepala dan kategori=pemerintahan');
        }

        // Update semua struktur organisasi lainnya yang belum punya NIP
        $strukturLain = StrukturOrganisasi::where(function($query) {
                $query->whereNull('nip')
                      ->orWhere('nip', '')
                      ->orWhere('nip', 'NIP. -'); // Hapus yang masih pakai format lama
            })
            ->where('id', '!=', $kepalaDesa->id ?? 0)
            ->get();

        if ($strukturLain->count() > 0) {
            $this->command->info("\n📝 Mengupdate " . $strukturLain->count() . " struktur organisasi lainnya dengan NIP default...");
            
            foreach ($strukturLain as $struktur) {
                $struktur->update([
                    'nip' => '-' // Default untuk yang tidak punya NIP (hanya tanda strip)
                ]);
            }
            
            $this->command->info('✅ Selesai! Silakan update NIP melalui Admin Panel');
        }
    }
}
