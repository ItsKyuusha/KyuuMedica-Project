<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index() {
        $dokter = Dokter::with('poli')->get();
        $poli = Poli::all();
        return view('dokter.index', [
            'dokter' => $dokter,
            'poli' => $poli,
            'mode' => 'index',
        ]);
    }

    public function create() {
        $dokter = Dokter::with('poli')->get();
        $poli = Poli::all();
        return view('dokter.create', [
            'dokter' => $dokter,
            'poli' => $poli,
            'mode' => 'create',
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'id_poli' => 'required'
        ]);

        Dokter::create($request->all());
        return redirect()->route('dokter.create')->with('success', 'Dokter berhasil ditambahkan.');
    }

    public function edit($id) {
        $dokter = Dokter::with('poli')->findOrFail($id);  // ambil 1 dokter dengan relasi poli
        $poli = Poli::all();
        return view('dokter.edit', compact('dokter', 'poli'));
    }

    public function update(Request $request, $id) {
        $dokter = Dokter::findOrFail($id);
        $dokter->update($request->all());
        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy($id) {
        Dokter::destroy($id);
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil dihapus.');
    }
}
