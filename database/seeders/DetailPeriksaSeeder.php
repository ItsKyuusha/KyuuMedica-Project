<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailPeriksa;

class DetailPeriksaSeeder extends Seeder
{
    public function run()
    {
        DetailPeriksa::create([
            'id_periksa' => 1,
            'id_obat' => 1,
        ]);

        DetailPeriksa::create([
            'id_periksa' => 1,
            'id_obat' => 2,
        ]);
    }
}

