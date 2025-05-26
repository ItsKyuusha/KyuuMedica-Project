<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pasien;

class PasienSeeder extends Seeder
{
    public function run()
    {
        Pasien::create([
            'nama' => 'Shaa',
            'alamat' => 'Jl. Sehat No. 10',
            'no_ktp' => '1234567890123456',
            'no_hp' => '08987654321',
            'no_rm' => 'RM001'
        ]);
    }
}

