<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index() {
        $pasien = Pasien::all();
        return view('pasien.index', compact('pasien'));
    }

    public function create() {
        return view('pasien.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_ktp' => 'required|unique:pasien',
            'no_hp' => 'required',
        ]);

        $count = Pasien::count() + 1;
        $no_rm = date('Ym') . '-' . $count;

        Pasien::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
            'no_rm' => $no_rm,
        ]);

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function edit($id) {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id) {
        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy($id) {
        Pasien::destroy($id);
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus.');
    }
}

