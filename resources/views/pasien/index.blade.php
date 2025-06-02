@extends('layouts.app')

@section('content')
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Manage Pasien</h4>
  </div>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No RM</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No KTP</th>
        <th>No HP</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pasien as $row)
      <tr>
        <td>{{ $row->no_rm }}</td>
        <td>{{ $row->nama }}</td>
        <td>{{ $row->alamat }}</td>
        <td>{{ $row->no_ktp }}</td>
        <td>{{ $row->no_hp }}</td>
        <td>
          <a href="{{ route('pasien.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
          <form action="{{ route('pasien.destroy', $row->id) }}" method="POST" class="d-inline delete-form">
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
{{-- SweetAlert2 CDN --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
      button.addEventListener('click', function (e) {
        e.preventDefault();

        Swal.fire({
          title: 'Yakin hapus pasien ini?',
          text: "Data yang dihapus tidak bisa dikembalikan!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Ya, hapus!',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            this.closest('form').submit();
          }
        });
      });
    });
  });
</script>
@endsection

@yield('scripts')
