@extends('layouts.app')

@section('content')
<div class="container">
  <h4>Edit Poli</h4>
  <form method="POST" action="{{ route('poli.update', $poli->id) }}">
    @csrf @method('PUT')
    <div class="form-group">
      <label>Nama Poli</label>
      <input name="nama_poli" class="form-control" value="{{ $poli->nama_poli }}" required>
    </div>
    <div class="form-group">
      <label>Keterangan</label>
      <textarea name="keterangan" class="form-control" rows="3">{{ $poli->keterangan }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('poli.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection
