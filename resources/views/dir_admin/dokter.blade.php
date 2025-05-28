@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <!-- Header dengan Judul dan Tombol -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Manage Dokter</h4>
    <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah Dokter</button>
  </div>
  <!-- Tabel Dokter -->
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Poli</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($dokter as $itemDokter)
      <tr>
        <td>{{ $itemDokter->nama }}</td>
        <td>{{ $itemDokter->alamat }}</td>
        <td>{{ $itemDokter->no_hp }}</td>
        <td>{{ $itemDokter->poli->nama_poli }}</td>
        <td>
          <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit{{ $itemDokter->id }}">Edit</button>
          <form method="POST" action="{{ route('dir_admin.dokter.destroy', $itemDokter->id) }}" class="d-inline">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
          </form>
        </td>
      </tr>

      <!-- Modal Edit -->
      <div class="modal fade" id="modalEdit{{ $itemDokter->id }}" tabindex="-1">
        <div class="modal-dialog">
          <form method="POST" action="{{ route('dir_admin.dokter.update', $itemDokter->id) }}">
            @csrf
            @method('PUT')
            <div class="modal-content">
              <div class="modal-header">
                <h5>Edit Dokter</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <input name="nama" class="form-control mb-2" value="{{ $itemDokter->nama }}" required>
                <input name="alamat" class="form-control mb-2" value="{{ $itemDokter->alamat }}" required>
                <input name="no_hp" class="form-control mb-2" value="{{ $itemDokter->no_hp }}" required>
                <select name="id_poli" class="form-control" required>
                  @foreach($poli as $itemPoli)
                    <option value="{{ $itemPoli->id }}" @if($itemPoli->id == $itemDokter->id_poli) selected @endif>
                      {{ $itemPoli->nama_poli }}
                    </option>
                  @endforeach
                </select>
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
    <form method="POST" action="{{ route('dir_admin.dokter.store') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5>Tambah Dokter</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <input name="nama" class="form-control mb-2" placeholder="Nama" required>
          <input name="alamat" class="form-control mb-2" placeholder="Alamat" required>
          <input name="no_hp" class="form-control mb-2" placeholder="No HP" required>
          <select name="id_poli" class="form-control" required>
            <option value="" disabled selected>Pilih Poli</option>
            @foreach($poli as $itemPoli)
              <option value="{{ $itemPoli->id }}">{{ $itemPoli->nama_poli }}</option>
            @endforeach
          </select>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
