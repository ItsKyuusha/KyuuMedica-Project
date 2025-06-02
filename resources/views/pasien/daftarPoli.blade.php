@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Form Pendaftaran ke Poli</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('daftarPoli.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Jadwal Dokter</label>
            <select name="id_jadwal" class="form-control" required>
                <option value="">-- Pilih Dokter dan Jadwal --</option>
                @foreach($jadwal as $j)
                    <option value="{{ $j->id }}">
                        {{ $j->dokter->nama }} ({{ $j->dokter->poli->nama_poli }}) - {{ $j->hari }} {{ $j->jam_mulai }} - {{ $j->jam_selesai }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Keluhan</label>
            <textarea name="keluhan" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-2">Daftar Poli</button>
    </form>
</div>
@endsection
