@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Riwayat Pendaftaran ke Poli</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('daftarPoli.create') }}" class="btn btn-primary mb-3">+ Daftar ke Poli</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Pasien</th>
                    <th>Dokter</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Keluhan</th>
                    <th>Tanggal Daftar</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($daftar as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->pasien->nama }}</td>
                        <td>Dr. {{ $item->jadwal->dokter->nama }}</td>
                        <td>{{ $item->jadwal->hari }}</td>
                        <td>{{ $item->jadwal->jam_mulai }} - {{ $item->jadwal->jam_selesai }}</td>
                        <td>{{ $item->keluhan }}</td>
                        <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                        <td>
                            <form action="{{ route('daftarPoli.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pendaftaran ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Belum ada pendaftaran ke poli.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
