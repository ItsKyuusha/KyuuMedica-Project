<?php

namespace App\Http\Controllers;

use App\Models\DaftarPoli;
use App\Models\Pasien;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarPoliController extends Controller
{
    public function index() {
        $daftar = DaftarPoli::with(['pasien', 'jadwal.dokter'])->get();
        return view('daftarPoli.index', compact('daftar'));
    }

    public function create() {
        $pasien = Pasien::all();
        $jadwal = JadwalPeriksa::with('dokter')->get();
        return view('daftarPoli.create', compact('pasien', 'jadwal'));
    }

    public function store(Request $request)
{
    $request->validate([
        'id_jadwal' => 'required|exists:jadwal_periksa,id',
        'keluhan' => 'required|string|max:255',
    ]);

    $user = Auth::user();
    $pasien = Pasien::where('id', $user->id)->firstOrFail(); // ambil data pasien dari user yang login

    // Hitung nomor antrian berdasarkan jumlah pendaftaran di jadwal yang sama
    $jumlahPendaftaran = DaftarPoli::where('id_jadwal', $request->id_jadwal)->count();
    $nomorAntrian = $jumlahPendaftaran + 1;

    DaftarPoli::create([
        'id_pasien' => $pasien->id,
        'id_jadwal' => $request->id_jadwal,
        'keluhan' => $request->keluhan,
        'no_antrian' => $nomorAntrian,  // simpan nomor antrian
    ]);

    return redirect()->route('daftarPoli.create')->with('success', 'Berhasil mendaftar ke poli! No Antrian: ' . $nomorAntrian);
}

    public function destroy($id) {
        DaftarPoli::destroy($id);
        return redirect()->route('daftarPoli.index')->with('success', 'Data pendaftaran dihapus.');
    }
}
