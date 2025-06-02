@extends('layouts.app')

@section('content')
<div class="container">
  <h4>Pendaftaran Pasien</h4>
  <form method="POST" action="{{ route('pasien.store') }}">
    @csrf
    <div class="mb-2"><input name="nama" class="form-control" placeholder="Nama"></div>
    <div class="mb-2"><input name="alamat" class="form-control" placeholder="Alamat"></div>
    <div class="mb-2"><input name="no_ktp" class="form-control" placeholder="No KTP"></div>
    <div class="mb-2"><input name="no_hp" class="form-control" placeholder="No HP"></div>
    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
