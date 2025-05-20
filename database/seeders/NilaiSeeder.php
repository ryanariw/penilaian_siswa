<?php

namespace Database\Seeders;

use App\Models\Nilai;
use Illuminate\Database\Seeder;

class NilaiSeeder extends Seeder
{
    public function run()
    {
        Nilai::create([
            'siswa_id' => 1,
            'mapel_id' => 1,
            'tahun_ajaran' => '2023/2024',
            'nilai_tugas' => 80,
            'uts' => 85,
            'uas' => 90,
            'nilai_akhir' => (80 + 85 + 90) / 3,
        ]);

        Nilai::create([
            'siswa_id' => 2,
            'mapel_id' => 2,
            'tahun_ajaran' => '2023/2024',
            'nilai_tugas' => 75,
            'uts' => 70,
            'uas' => 80,
            'nilai_akhir' => (75 + 70 + 80) / 3,
        ]);
    }
}

