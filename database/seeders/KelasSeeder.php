<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    public function run()
    {
        Kelas::create(['guru_id' => 1, 'kode_kelas' => '1A', 'nama_kelas' => 'Kelas 1A']);
        Kelas::create(['guru_id' => 2, 'kode_kelas' => '1B', 'nama_kelas' => 'Kelas 1B']);
        Kelas::create(['guru_id' => 3, 'kode_kelas' => '2A', 'nama_kelas' => 'Kelas 2A']);
        Kelas::create(['guru_id' => 4, 'kode_kelas' => '2B', 'nama_kelas' => 'Kelas 2B']);
        Kelas::create(['guru_id' => 5, 'kode_kelas' => '3A', 'nama_kelas' => 'Kelas 3A']);
        Kelas::create(['guru_id' => 5, 'kode_kelas' => '3B', 'nama_kelas' => 'Kelas 3B']);
        Kelas::create(['guru_id' => 6, 'kode_kelas' => '4A', 'nama_kelas' => 'Kelas 4A']);
        Kelas::create(['guru_id' => 6, 'kode_kelas' => '4B', 'nama_kelas' => 'Kelas 4B']);
        Kelas::create(['guru_id' => 7, 'kode_kelas' => '5A', 'nama_kelas' => 'Kelas 5A']);
        Kelas::create(['guru_id' => 7, 'kode_kelas' => '5B', 'nama_kelas' => 'Kelas 5B']);
        Kelas::create(['guru_id' => 8, 'kode_kelas' => '6A', 'nama_kelas' => 'Kelas 6A']);
        Kelas::create(['guru_id' => 9, 'kode_kelas' => '6B', 'nama_kelas' => 'Kelas 6B']);
    }
    }


