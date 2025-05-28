@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Manage Poli</h4>
    <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah Poli</button>
  </div>
  <!-- Tabel -->
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Nama Poli</th>
        <th>Keterangan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($poli as $poli)
      <tr>
        <td>{{ $poli->nama_poli }}</td>
        <td>{{ $poli->keterangan }}</td>
        <td>
          <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit{{ $poli->id }}">Edit</button>
          <form action="{{ route('dir_admin.poli.destroy', $poli->id) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
          </form>
        </td>
      </tr>

      <!-- Modal Edit -->
      <div class="modal fade" id="modalEdit{{ $poli->id }}" tabindex="-1">
        <div class="modal-dialog">
          <form method="POST" action="{{ route('dir_admin.poli.update', $poli->id) }}">
            @csrf @method('PUT')
            <div class="modal-content">
              <div class="modal-header"><h5>Edit Poli</h5></div>
              <div class="modal-body">
                <input name="nama_poli" class="form-control mb-2" value="{{ $poli->nama_poli }}">
                <textarea name="keterangan" class="form-control" rows="3">{{ $poli->keterangan }}</textarea>
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
    <form method="POST" action="{{ route('dir_admin.poli.store') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header"><h5>Tambah Poli</h5></div>
        <div class="modal-body">
          <input name="nama_poli" class="form-control mb-2" placeholder="Nama Poli">
          <textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3"></textarea>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
