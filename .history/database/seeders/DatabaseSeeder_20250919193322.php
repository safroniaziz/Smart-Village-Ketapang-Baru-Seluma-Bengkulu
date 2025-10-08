<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nama_lengkap' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Seed data warga untuk halaman statistik
        $this->call([
            AdminSeeder::class,
            UserSeeder1::class,
            // UserSeeder2::class, // Skip karena mungkin ada duplikasi NIK
            // UserSeeder3::class, // Skip karena mungkin ada duplikasi NIK
            PengaduanSeeder::class,
            MonografiDesaSeeder::class,
            PeruntukanLahanSeeder::class,
            PotensiDesaSeeder::class,
            BatasWilayahSeeder::class,
            IklimDesaSeeder::class,
            FasilitasDesaSeeder::class,
        ]);
    }
}
