@extends('layouts.app')

@section('content')
<div class="container">
  <h4>Edit Pasien</h4>
  <form method="POST" action="{{ route('pasien.update', $pasien->id) }}">
    @csrf @method('PUT')
    <div class="mb-2"><input name="nama" class="form-control" value="{{ $pasien->nama }}" placeholder="Nama"></div>
    <div class="mb-2"><input name="alamat" class="form-control" value="{{ $pasien->alamat }}" placeholder="Alamat"></div>
    <div class="mb-2"><input name="no_ktp" class="form-control" value="{{ $pasien->no_ktp }}" placeholder="No KTP"></div>
    <div class="mb-2"><input name="no_hp" class="form-control" value="{{ $pasien->no_hp }}" placeholder="No HP"></div>
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
