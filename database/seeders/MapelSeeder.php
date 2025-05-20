<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    public function run()
    {
        Mapel::create(['kode' => 'PAI001', 'nama_mapel' => 'PAI']);
        Mapel::create(['kode' => 'PAI002', 'nama_mapel' => 'PAI 2']);
        Mapel::create(['kode' => 'PP001', 'nama_mapel' => 'Pendidikan Pancasila']);
        Mapel::create(['kode' => 'PP002', 'nama_mapel' => 'Pendidikan Pancasila 2']);
        Mapel::create(['kode' => 'BIND001', 'nama_mapel' => 'Bahasa Indonesia']);
        Mapel::create(['kode' => 'BIND002', 'nama_mapel' => 'Bahasa Indonesia 2']);
        Mapel::create(['kode' => 'MTK001', 'nama_mapel' => 'Matematika']);
        Mapel::create(['kode' => 'MTK002', 'nama_mapel' => 'Matematika 2']);
        Mapel::create(['kode' => 'IPAS001', 'nama_mapel' => 'IPAS']);
        Mapel::create(['kode' => 'SM001', 'nama_mapel' => 'Seni Musik']);
        Mapel::create(['kode' => 'SM002', 'nama_mapel' => 'Seni Musik 2']);
        Mapel::create(['kode' => 'SR001', 'nama_mapel' => 'Seni Rupa']);
        Mapel::create(['kode' => 'SR002', 'nama_mapel' => 'Seni Rupa 2']);
        Mapel::create(['kode' => 'ST001', 'nama_mapel' => 'Seni Tari']);
        Mapel::create(['kode' => 'ST002', 'nama_mapel' => 'Seni Tari 2']);
        Mapel::create(['kode' => 'PJOK001', 'nama_mapel' => 'PJOK']);
        Mapel::create(['kode' => 'PJOK002', 'nama_mapel' => 'PJOK 2']);
        Mapel::create(['kode' => 'BS001', 'nama_mapel' => 'Bahasa Sunda']);
        Mapel::create(['kode' => 'BS002', 'nama_mapel' => 'Bahasa Sunda 2']);
    }
}

