<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat akun admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
            'nik' => null,
            'nama_lengkap' => 'Administrator Sistem',
            'status_aktif' => true,
            'is_kepala_keluarga' => false,
            'desa' => 'Ketapang Baru',
            'kecamatan' => 'Seluma',
            'kabupaten' => 'Seluma',
            'provinsi' => 'Bengkulu',
            'kewarganegaraan' => 'WNI',
        ]);

        $this->command->info('Admin user created successfully!');
        $this->command->info('Email: admin@mail.com');
        $this->command->info('Password: password');
    }
}
