<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Periksa;

class PeriksaSeeder extends Seeder
{
    public function run()
    {
        Periksa::create([
            'id_daftar_poli' => 1,
            'tgl_periksa' => now(),
            'catatan' => 'Pasien demam ringan, diberi obat',
            'biaya_periksa' => 50000,
        ]);
    }
}

