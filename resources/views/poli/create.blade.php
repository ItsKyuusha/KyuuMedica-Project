@extends('layouts.app')

@section('content')
<div class="container">
  <h4>Tambah Poli</h4>
  <form method="POST" action="{{ route('poli.store') }}">
    @csrf
    <div class="form-group">
      <label>Nama Poli</label>
      <input name="nama_poli" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Keterangan</label>
      <textarea name="keterangan" class="form-control" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('poli.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection
