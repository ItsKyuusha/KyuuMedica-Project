@extends('layouts.app') {{-- Atau sesuaikan dengan layout AdminLTE-mu --}}

@section('content')
<div class="container">
    <h3 class="mb-4">Daftar ke Poli</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('daftarPoli.store') }}" method="POST">
        @csrf

        {{-- Pilih Dokter & Jadwal --}}
        <div class="mb-3">
            <label for="id_jadwal" class="form-label">Pilih Dokter & Jadwal</label>
            <select name="id_jadwal" id="id_jadwal" class="form-select" required>
                <option value="" disabled selected>-- Pilih Jadwal Praktek --</option>
                @foreach($jadwal as $j)
                    <option value="{{ $j->id }}">
                        Dr. {{ $j->dokter->nama }} - Hari: {{ $j->hari }} - Jam: {{ $j->jam_mulai }} - {{ $j->jam_selesai }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Keluhan --}}
        <div class="mb-3">
            <label for="keluhan" class="form-label">Keluhan / Gejala</label>
            <textarea name="keluhan" id="keluhan" rows="3" class="form-control" required></textarea>
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
        <a href="{{ route('daftarPoli.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
