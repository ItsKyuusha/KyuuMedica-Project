{{-- resources/views/dokter/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
  <h4>Tambah Dokter</h4>
  <form method="POST" action="{{ route('dokter.store') }}">
    @csrf
    <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="form-group">
      <label for="alamat">Alamat</label>
      <input type="text" class="form-control" id="alamat" name="alamat" required>
    </div>
    <div class="form-group">
      <label for="no_hp">No HP</label>
      <input type="text" class="form-control" id="no_hp" name="no_hp" required>
    </div>
    <div class="form-group">
      <label for="id_poli">Poli</label>
      <select name="id_poli" class="form-control" required>
        <option value="" disabled selected>Pilih Poli</option>
        @foreach($poli as $poli)
        <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
  </form>
</div>
@endsection
