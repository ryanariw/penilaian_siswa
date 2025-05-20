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

        $data = [];

        for ($i = 1; $i <= 20; $i++) {
            $data[] = [
                'kelas_id' => $faker->numberBetween(1, 5), // sesuaikan jumlah kelas yang ada
                'nama' => $faker->name(),
                'nis' => 'NIS' . str_pad($i, 4, '0', STR_PAD_LEFT), // NIS unik misal NIS0001
                'alamat' => $faker->address(),
                'jenis kelamin' => $faker->randomElement(['L', 'P']),
                 'user_id' => 18,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('siswa')->insert($data);
    }
}
