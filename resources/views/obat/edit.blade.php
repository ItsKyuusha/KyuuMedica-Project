@extends('layouts.app')

@section('content')
<div class="container">
  <h4>Edit Obat</h4>
  <form method="POST" action="{{ route('obat.update', $obat->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group mb-2">
      <label>Nama</label>
      <input name="nama" class="form-control" value="{{ $obat->nama }}" required>
    </div>
    <div class="form-group mb-2">
      <label>Kemasan</label>
      <input name="kemasan" class="form-control" value="{{ $obat->kemasan }}" required>
    </div>
    <div class="form-group mb-2">
      <label>Harga</label>
      <input name="harga" type="number" class="form-control" value="{{ $obat->harga }}" required>
    </div>
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('obat.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection
