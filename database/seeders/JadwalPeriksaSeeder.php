<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalPeriksa;

class JadwalPeriksaSeeder extends Seeder
{
    public function run()
    {
        JadwalPeriksa::create([
            'id_dokter' => 1,
            'hari' => 'Senin',
            'jam_mulai' => '08:00:00',
            'jam_selesai' => '12:00:00',
        ]);
    }
}

