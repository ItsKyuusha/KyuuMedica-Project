<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Poli;
use App\Models\Obat;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $jumlahDokter = Dokter::count();
        $jumlahPasien = Pasien::count();
        $jumlahPoli = Poli::count();
        $jumlahObat = Obat::count();

        return view('dashboard.dashboardAdmin', compact('jumlahDokter', 'jumlahPasien', 'jumlahPoli', 'jumlahObat'));
    }
}
