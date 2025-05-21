<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User as Authenticatable;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'nip' => 'admin123', // nip unik dengan timestamp
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Iis Nuryati, S.Pd.SD',
            'nip' => '197507052022211002',
            'password' => bcrypt('test123'),
            'role' => 'guru',
        ]);
        User::create([
            'name' => 'Ecin S. S.Pd.SD',
            'nip' => '198305162023212006',
            'password' => bcrypt('test123'),
            'role' => 'guru',
        ]);
        User::create([
            'name' => 'Heni Apriani. S.Pd',
            'nip' => '198907212025212029',
            'password' => bcrypt('test123'),
            'role' => 'guru',
        ]);
        User::create([
            'name' => 'Boy Pangestu, S.Pd',
            'nip' => '197304102024211001',
            'password' => bcrypt('test123'),
            'role' => 'guru',
        ]);
        User::create([
            'name' => 'SALSIH, S.Pd.SD',
            'nip' => '197204132014052001',
            'password' => bcrypt('test123'),
            'role' => 'guru',
        ]);
        User::create([
            'name' => 'Melati Wulandari, S.Pd',
            'nip' => '198510192021212002',
            'password' => bcrypt('test123'),
            'role' => 'guru',
        ]);
        User::create([
            'name' => 'Herman Sasmita, S.Pd',
            'nip' => '198603102023211006',
            'password' => bcrypt('test123'),
            'role' => 'guru',
        ]);
        User::create([
            'name' => 'Mochamad Dicky, S.Pd',
            'nip' => '199115122023211004',
            'password' => bcrypt('test123'),
            'role' => 'guru',
        ]);
        User::create([
            'name' => 'Suherman, S.Pd.I',
            'nip' => '197901182021211001',
            'password' => bcrypt('test123'),
            'role' => 'guru',
        ]);
        User::create([
            'name' => 'Idah Faridah, S.Pd.MM',
            'nip' => '197310221996032002',
            'password' => bcrypt('test123'),
            'role' => 'guru',
        ]);
        User::create([
            'name' => 'Idah Faridah, S.Pd.MM',
            'nip' => '197310221996032002',
            'password' => bcrypt('test123'),
            'role' => 'guru',
        ]);
        User::create([
            'name' => 'Idah Faridah, S.Pd.MM',
            'nip' => '197310221996032002',
            'password' => bcrypt('test123'),
            'role' => 'guru',
        ]);
        User::create([
            'name' => 'Putri Agustin, S.Pd',
            'nip' => '1989072',
            'password' => bcrypt('test123'),
            'role' => 'guru',
        ]);

         User::create([
            'name' => 'Kepala Sekolah',
            'nip' => '12345678',
            'password' => bcrypt('test123'),
            'role' => 'kepsek',
        ]);
       
          User::create([
            'name' => 'Contoh Siswa',
            'nip' => '123',
            'password' => bcrypt('test123'),
            'role' => 'siswa',
        ]);
         User::create([
            'name' => 'GuruPAI',
            'nip' => '987',
            'password' => bcrypt('test123'),
            'role' => 'guru_pai',
        ]);
       
       
       



       

        
        $this->call([
            GuruSeeder::class,
            KelasSeeder::class,
            SiswaSeeder::class,
            MapelSeeder::class,
            NilaiSeeder::class,
            GuruMapelSeeder::class,
            GuruPaiSeeder::class,
        ]);
    
    }
}
