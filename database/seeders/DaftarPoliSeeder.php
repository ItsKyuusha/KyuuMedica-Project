<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DaftarPoli;

class DaftarPoliSeeder extends Seeder
{
    public function run()
    {
        DaftarPoli::create([
            'id_pasien' => 1,
            'id_jadwal' => 1,
            'keluhan' => 'Demam dan pusing',
        ]);
    }
}

