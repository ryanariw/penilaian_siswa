<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    public function run()
    {
        Guru::create(['nama' => 'Iis Nuryati, S.Pd.SD', 'nip' => '197507052022211002', 'user_id' => '3']);
        Guru::create(['nama' => 'Ecin S. S.Pd.SD', 'nip' => '198305162023212006', 'user_id' => '4']);
        Guru::create(['nama' => 'Heni Apriani. S.Pd', 'nip' => '198907212025212029', 'user_id' => '5']);
        Guru::create(['nama' => 'Putri Agustin, S.Pd', 'nip' => '1989072', 'user_id' => '12']);
        Guru::create(['nama' => 'Boy Pangestu, S.Pd', 'nip' => '197304102024211001', 'user_id' => '6']);
        Guru::create(['nama' => 'SALSIH, S.Pd.SD', 'nip' => '197204132014052001', 'user_id' => '7']);
        Guru::create(['nama' => 'Melati Wulandari, S.Pd', 'nip' => '198510192021212002', 'user_id' => '8']);
        Guru::create(['nama' => 'Herman Sasmita, S.Pd', 'nip' => '198603102023211006', 'user_id' => '9']);
        Guru::create(['nama' => 'Mochamad Dicky, S.Pd', 'nip' => '199115122023211004', 'user_id' => '10']);
        Guru::create(['nama' => 'Suherman, S.Pd.I', 'nip' => '197901182021211001', 'user_id' => '11']);
        Guru::create(['nama' => 'Idah Faridah, S.Pd.MM', 'nip' => '197310221996032002', 'user_id' => '12']);
    }
}
