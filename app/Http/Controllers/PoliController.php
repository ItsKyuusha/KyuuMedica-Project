<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function index() {
        $poli = Poli::all();
        return view('dir_admin.poli', compact('poli'));
    }

    public function create() {
        return view('dir_admin.poli.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_poli' => 'required',
            'keterangan' => 'required'
        ]);

        Poli::create($request->all());
        return redirect()->route('dir_admin.poli.index')->with('success', 'Poli berhasil ditambahkan.');
    }

    public function edit($id) {
        $poli = Poli::findOrFail($id);
        return view('dir_admin.poli.edit', compact('poli'));
    }

    public function update(Request $request, $id) {
        $poli = Poli::findOrFail($id);
        $poli->update($request->all());
        return redirect()->route('dir_admin.poli.index')->with('success', 'Data poli berhasil diperbarui.');
    }

    public function destroy($id) {
        Poli::destroy($id);
        return redirect()->route('dir_admin.poli.index')->with('success', 'Poli berhasil dihapus.');
    }
}

