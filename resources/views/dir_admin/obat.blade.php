@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Manage Obat</h4>
    <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah Obat</button>
  </div>
  <!-- Tabel Obat -->
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Kemasan</th>
        <th>Harga</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($obat as $obat)
      <tr>
        <td>{{ $obat->nama }}</td>
        <td>{{ $obat->kemasan }}</td>
        <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
        <td>
          <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit{{ $obat->id }}">Edit</button>
          <form method="POST" action="{{ route('dir_admin.obat.destroy', $obat->id) }}" class="d-inline">
            @csrf @method('DELETE')
            <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">Hapus</button>
          </form>
        </td>
      </tr>

      <!-- Modal Edit -->
      <div class="modal fade" id="modalEdit{{ $obat->id }}" tabindex="-1">
        <div class="modal-dialog">
          <form method="POST" action="{{ route('dir_admin.obat.update', $obat->id) }}">
            @csrf @method('PUT')
            <div class="modal-content">
              <div class="modal-header"><h5>Edit Obat</h5></div>
              <div class="modal-body">
                <input name="nama" class="form-control mb-2" value="{{ $obat->nama }}" placeholder="Nama">
                <input name="kemasan" class="form-control mb-2" value="{{ $obat->kemasan }}" placeholder="Kemasan">
                <input name="harga" type="number" class="form-control mb-2" value="{{ $obat->harga }}" placeholder="Harga">
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      @endforeach
    </tbody>
  </table>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('dir_admin.obat.store') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header"><h5>Tambah Obat</h5></div>
        <div class="modal-body">
          <input name="nama" class="form-control mb-2" placeholder="Nama">
          <input name="kemasan" class="form-control mb-2" placeholder="Kemasan">
          <input name="harga" type="number" class="form-control mb-2" placeholder="Harga">
        </div>
        <div class="modal-footer">
          <button class="btn btn-success">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
