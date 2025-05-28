<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index() {
        $obat = Obat::all();
        return view('dir_admin.obat', compact('obat'));
    }

    public function create() {
        return view('dir_admin.obat.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'kemasan' => 'required',
            'harga' => 'required|numeric'
        ]);

        Obat::create($request->all());
        return redirect()->route('dir_admin.obat.index')->with('success', 'Obat berhasil ditambahkan.');
    }

    public function edit($id) {
        $obat = Obat::findOrFail($id);
        return view('dir_admin.obat.edit', compact('obat'));
    }

    public function update(Request $request, $id) {
        $obat = Obat::findOrFail($id);
        $obat->update($request->all());
        return redirect()->route('dir_admin.obat.index')->with('success', 'Data obat berhasil diperbarui.');
    }

    public function destroy($id) {
        Obat::destroy($id);
        return redirect()->route('dir_admin.obat.index')->with('success', 'Obat berhasil dihapus.');
    }
}

