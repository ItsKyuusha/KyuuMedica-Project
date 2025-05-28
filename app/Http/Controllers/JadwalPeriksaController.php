<?php

namespace App\Http\Controllers;

use App\Models\JadwalPeriksa;
use App\Models\Dokter;
use Illuminate\Http\Request;

class JadwalPeriksaController extends Controller
{
    public function index() {
        $jadwal = JadwalPeriksa::with('dokter')->get();
        return view('jadwal.index', compact('jadwal'));
    }

    public function create() {
        $dokter = Dokter::all();
        return view('jadwal.create', compact('dokter'));
    }

    public function store(Request $request) {
        $request->validate([
            'id_dokter' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
        ]);

        // validasi jadwal bentrok bisa ditambahkan di sini

        JadwalPeriksa::create($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id) {
        $jadwal = JadwalPeriksa::findOrFail($id);
        $dokter = Dokter::all();
        return view('jadwal.edit', compact('jadwal', 'dokter'));
    }

    public function update(Request $request, $id) {
        $jadwal = JadwalPeriksa::findOrFail($id);
        $jadwal->update($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy($id) {
        JadwalPeriksa::destroy($id);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
