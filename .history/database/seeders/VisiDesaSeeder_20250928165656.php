<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VisiDesa;

class VisiDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisiDesa::create([
            'visi' => 'Mewujudkan Desa yang Maju, Mandiri, dan Berkelanjutan',
            'deskripsi' => 'Visi ini mencerminkan komitmen kami untuk membangun desa yang tidak hanya maju secara ekonomi, tetapi juga mandiri dalam pengelolaan sumber daya dan berkelanjutan untuk generasi mendatang.',
            'deskripsi_section' => 'Pendekatan partisipatif dalam mewujudkan visi dan misi desa dengan melibatkan seluruh komponen masyarakat',
            'pendekatan_deskripsi' => 'Penyusunan Visi dan Misi Desa Ketapang Baru dilakukan dengan pendekatan partisipatif, melibatkan pihak-pihak yang berkepentingan di desa.'
        ]);
    }
}
