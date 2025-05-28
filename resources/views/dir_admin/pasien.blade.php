@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Manage Pasien</h4>
    <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah Pasien</button>
  </div>
  <!-- Tabel Pasien -->
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No RM</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No KTP</th>
        <th>No HP</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pasien as $pasien)
      <tr>
        <td>{{ $pasien->no_rm }}</td>
        <td>{{ $pasien->nama }}</td>
        <td>{{ $pasien->alamat }}</td>
        <td>{{ $pasien->no_ktp }}</td>
        <td>{{ $pasien->no_hp }}</td>
        <td>
          <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit{{ $pasien->id }}">Edit</button>
          <form method="POST" action="{{ route('dir_admin.pasien.destroy', $pasien->id) }}" class="d-inline">
            @csrf @method('DELETE')
            <button onclick="return confirm('Yakin hapus pasien ini?')" class="btn btn-danger btn-sm">Hapus</button>
          </form>
        </td>
      </tr>

      <!-- Modal Edit -->
      <div class="modal fade" id="modalEdit{{ $pasien->id }}" tabindex="-1">
        <div class="modal-dialog">
          <form method="POST" action="{{ route('dir_admin.pasien.update', $pasien->id) }}">
            @csrf @method('PUT')
            <div class="modal-content">
              <div class="modal-header"><h5>Edit Pasien</h5></div>
              <div class="modal-body">
                <input name="nama" class="form-control mb-2" value="{{ $pasien->nama }}" placeholder="Nama">
                <input name="alamat" class="form-control mb-2" value="{{ $pasien->alamat }}" placeholder="Alamat">
                <input name="no_ktp" class="form-control mb-2" value="{{ $pasien->no_ktp }}" placeholder="No KTP">
                <input name="no_hp" class="form-control mb-2" value="{{ $pasien->no_hp }}" placeholder="No HP">
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
    <form method="POST" action="{{ route('dir_admin.pasien.store') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header"><h5>Tambah Pasien</h5></div>
        <div class="modal-body">
          <input name="nama" class="form-control mb-2" placeholder="Nama">
          <input name="alamat" class="form-control mb-2" placeholder="Alamat">
          <input name="no_ktp" class="form-control mb-2" placeholder="No KTP">
          <input name="no_hp" class="form-control mb-2" placeholder="No HP">
        </div>
        <div class="modal-footer">
          <button class="btn btn-success">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
