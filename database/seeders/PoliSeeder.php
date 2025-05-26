<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poli;

class PoliSeeder extends Seeder
{
    public function run()
    {
        Poli::create(['nama_poli' => 'Umum', 'keterangan' => 'Pelayanan umum']);
        Poli::create(['nama_poli' => 'Gigi', 'keterangan' => 'Pelayanan gigi']);
    }
}

