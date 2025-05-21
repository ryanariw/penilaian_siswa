<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Ambil semua id dari users dan kelas
        $userIds = DB::table('users')->pluck('id')->toArray();
        $kelasIds = DB::table('kelas')->pluck('id')->toArray();
        $offset = 1000; // Deklarasi offset

        $data = [];

        for ($i = 1; $i <= 20; $i++) {
            $data[] = [
                'user_id' => $faker->randomElement($userIds),
                'kelas_id' => $faker->randomElement($kelasIds),
                'nama' => $faker->name(),
                'nis' => 'NIS' . str_pad($i + $offset, 4, '0', STR_PAD_LEFT),
                'alamat' => $faker->address(),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('siswa')->insert($data);
    }
}
