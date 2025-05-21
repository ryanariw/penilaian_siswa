<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class GuruPaiSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Guru PAI Test',
            'nip' => 'guru_pai_001',
            'password' => bcrypt('test123'),
            'role' => 'guru_pai',
        ]);
    }
}
