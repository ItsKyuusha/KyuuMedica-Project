{{-- resources/views/dokter/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
  <h4>Manage Dokter</h4>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Poli</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($dokter as $dokter)
      <tr>
        <td>{{ $dokter->nama }}</td>
        <td>{{ $dokter->alamat }}</td>
        <td>{{ $dokter->no_hp }}</td>
        <td>{{ $dokter->poli->nama_poli }}</td>
        <td>
          <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-warning btn-sm">Edit</a>

          {{-- Form hapus --}}
          <form method="POST" action="{{ route('dokter.destroy', $dokter->id) }}" class="d-inline delete-form">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-danger btn-sm btn-delete">Hapus</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

@section('scripts')
{{-- Tambahkan CDN SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
      button.addEventListener('click', function(e) {
        e.preventDefault();

        Swal.fire({
          title: 'Yakin hapus data dokter?',
          text: "Data yang sudah dihapus tidak bisa dikembalikan!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Ya, hapus!',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            // Submit form hapus
            this.closest('form').submit();
          }
        });
      });
    });
  });
</script>
@endsection

@yield('scripts')

