{{-- resources/views/dokter/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
  <h4>Edit Dokter</h4>
  <form method="POST" action="{{ route('dokter.update', $dokter->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" value="{{ $dokter->nama }}" required>
    </div>
    <div class="form-group">
      <label for="alamat">Alamat</label>
      <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $dokter->alamat }}" required>
    </div>
    <div class="form-group">
      <label for="no_hp">No HP</label>
      <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $dokter->no_hp }}" required>
    </div>
    <div class="form-group">
      <label for="id_poli">Poli</label>
      <select name="id_poli" class="form-control" required>
        @foreach($poli as $poli)
        <option value="{{ $poli->id }}" @if($poli->id == $dokter->id_poli) selected @endif>{{ $poli->nama_poli }}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@endsection
