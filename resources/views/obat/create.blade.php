@extends('layouts.app')

@section('content')
<div class="container">
  <h4>Tambah Obat</h4>
  <form method="POST" action="{{ route('obat.store') }}">
    @csrf
    <div class="form-group mb-2">
      <label>Nama</label>
      <input name="nama" class="form-control" required>
    </div>
    <div class="form-group mb-2">
      <label>Kemasan</label>
      <input name="kemasan" class="form-control" required>
    </div>
    <div class="form-group mb-2">
      <label>Harga</label>
      <input name="harga" type="number" class="form-control" required>
    </div>
    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('obat.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection
