<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruMapelSeeder extends Seeder
{
    public function run()
    {
        DB::table('guru_mapel')->insert([
            // Guru ID 1 mengajar PAI kelas 1/3 dan PAI 2 kelas 4/6
            ['guru_id' => 1, 'mapel_id' => 1],  // PAI001 - kelas 1/3
            ['guru_id' => 1, 'mapel_id' => 2],  // PAI002 - kelas 4/6

            // Guru ID 2 mengajar Pendidikan Pancasila kelas 1/3 dan Pendidikan Pancasila 2 kelas 4/6
            ['guru_id' => 2, 'mapel_id' => 3],  // PP001
            ['guru_id' => 2, 'mapel_id' => 4],  // PP002

            // Guru ID 3 mengajar Bahasa Indonesia kelas 1/3 dan Bahasa Indonesia 2 kelas 4/6
            ['guru_id' => 3, 'mapel_id' => 5],  // BIND001
            ['guru_id' => 3, 'mapel_id' => 6],  // BIND002

            // Guru ID 4 mengajar Matematika kelas 1/3 dan Matematika 2 kelas 4/6
            ['guru_id' => 4, 'mapel_id' => 7],  // MTK001
            ['guru_id' => 4, 'mapel_id' => 8],  // MTK002

            // Guru ID 5 mengajar IPAS (hanya 1 mapel)
            ['guru_id' => 5, 'mapel_id' => 9],  // IPAS001

            // Guru ID 6 mengajar Seni Musik kelas 1/3 dan Seni Musik 2 kelas 4/6
            ['guru_id' => 6, 'mapel_id' => 10], // SM001
            ['guru_id' => 6, 'mapel_id' => 11], // SM002

            // Guru ID 7 mengajar Seni Rupa kelas 1/3 dan Seni Rupa 2 kelas 4/6
            ['guru_id' => 7, 'mapel_id' => 12], // SR001
            ['guru_id' => 7, 'mapel_id' => 13], // SR002

            // Guru ID 8 mengajar Seni Tari kelas 1/3 dan PJOK 2 kelas 4/6
            ['guru_id' => 8, 'mapel_id' => 15], // ST002 (kelas 4/6)
            ['guru_id' => 8, 'mapel_id' => 16], // PJOK001 (kelas 1/3)

            // Guru ID 9 mengajar PJOK kelas 1/3 dan Seni Tari 2 kelas 4/6
            ['guru_id' => 9, 'mapel_id' => 16], // PJOK001 (kelas 1/3)
            ['guru_id' => 9, 'mapel_id' => 14], // ST001 (kelas 4/6)

            // Guru ID 10 mengajar Bahasa Sunda kelas 1/3 dan Bahasa Sunda 2 kelas 4/6
            ['guru_id' => 10, 'mapel_id' => 18], // BS001
            ['guru_id' => 10, 'mapel_id' => 19], // BS002
        ]);
    }
}
