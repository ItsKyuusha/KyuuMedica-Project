<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama' => 'Kyuusha',
                'alamat' => 'Semarang',
                'no_hp' => '081229429025',
                'email' => 'kyuushaxyz@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ],
            [
                'nama' => 'Dr. Komar',
                'alamat' => 'Semarang',
                'no_hp' => '081298765432',
                'email' => 'komar@gmail.com',
                'role' => 'dokter',
                'password' => Hash::make('password'),
            ],
            [            
                'nama' => 'Shaa',
                'alamat' => 'Semarang',
                'no_hp' => '081234567890',
                'email' => 'shaa@gmail.com',
                'role' => 'pasien',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
