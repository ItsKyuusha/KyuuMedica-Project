<?php

namespace App\Http\Controllers;

use App\Models\DetailPeriksa;
use App\Models\Periksa;
use App\Models\Obat;
use Illuminate\Http\Request;

class DetailPeriksaController extends Controller
{
    public function index($id_periksa) {
        $periksa = Periksa::with('daftarPoli.pasien')->findOrFail($id_periksa);
        $detail = DetailPeriksa::with('obat')->where('id_periksa', $id_periksa)->get();
        return view('detailperiksa.index', compact('periksa', 'detail'));
    }

    public function create($id_periksa) {
        $obat = Obat::all();
        return view('detailperiksa.create', compact('id_periksa', 'obat'));
    }

    public function store(Request $request) {
        $request->validate([
            'id_periksa' => 'required',
            'id_obat' => 'required',
        ]);

        DetailPeriksa::create($request->all());
        return redirect()->route('detailperiksa.index', $request->id_periksa)->with('success', 'Obat berhasil ditambahkan.');
    }

    public function destroy($id) {
        $detail = DetailPeriksa::findOrFail($id);
        $id_periksa = $detail->id_periksa;
        $detail->delete();
        return redirect()->route('detailperiksa.index', $id_periksa)->with('success', 'Obat berhasil dihapus.');
    }
}

