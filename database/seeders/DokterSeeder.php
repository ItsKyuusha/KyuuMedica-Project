<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dokter;

class DokterSeeder extends Seeder
{
    public function run()
    {
        Dokter::create([
            'nama' => 'Dr. Kyuu',
            'alamat' => 'Jl. Klinik No. 1',
            'no_hp' => '08123456789',
            'id_poli' => 1,
        ]);
    }
}

