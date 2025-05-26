<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Obat;

class ObatSeeder extends Seeder
{
    public function run()
    {
        Obat::create(['nama' => 'Paracetamol', 'kemasan' => 'Tablet 500mg', 'harga' => 1000]);
        Obat::create(['nama' => 'Amoxicillin', 'kemasan' => 'Kapsul 250mg', 'harga' => 1500]);
    }
}

