<?php

namespace App\Http\Controllers;

use App\Models\Periksa;
use App\Models\DaftarPoli;
use Illuminate\Http\Request;

class PeriksaController extends Controller
{
    public function index() {
        $periksa = Periksa::with(['daftarPoli.pasien', 'daftarPoli.jadwal.dokter'])->get();
        return view('periksa.index', compact('periksa'));
    }

    public function create() {
        $daftar = DaftarPoli::with(['pasien', 'jadwal.dokter'])->get();
        return view('periksa.create', compact('daftar'));
    }

    public function store(Request $request) {
        $request->validate([
            'id_daftar_poli' => 'required',
            'tgl_periksa' => 'required|date',
            'catatan' => 'required',
            'biaya_periksa' => 'required|numeric',
        ]);

        Periksa::create($request->all());
        return redirect()->route('periksa.index')->with('success', 'Pemeriksaan pasien berhasil disimpan.');
    }

    public function show($id) {
        $periksa = Periksa::with(['daftarPoli.pasien', 'daftarPoli.jadwal.dokter'])->findOrFail($id);
        return view('periksa.show', compact('periksa'));
    }

    public function destroy($id) {
        Periksa::destroy($id);
        return redirect()->route('periksa.index')->with('success', 'Data periksa dihapus.');
    }
}

