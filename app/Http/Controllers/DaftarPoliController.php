<?php

namespace App\Http\Controllers;

use App\Models\DaftarPoli;
use App\Models\Pasien;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;

class DaftarPoliController extends Controller
{
    public function index() {
        $daftar = DaftarPoli::with(['pasien', 'jadwal.dokter'])->get();
        return view('daftarpoli.index', compact('daftar'));
    }

    public function create() {
        $pasien = Pasien::all();
        $jadwal = JadwalPeriksa::with('dokter')->get();
        return view('daftarpoli.create', compact('pasien', 'jadwal'));
    }

    public function store(Request $request) {
        $request->validate([
            'id_pasien' => 'required',
            'id_jadwal' => 'required',
            'keluhan' => 'required',
        ]);

        DaftarPoli::create($request->all());
        return redirect()->route('daftarpoli.index')->with('success', 'Pendaftaran ke poli berhasil.');
    }

    public function destroy($id) {
        DaftarPoli::destroy($id);
        return redirect()->route('daftarpoli.index')->with('success', 'Data pendaftaran dihapus.');
    }
}
