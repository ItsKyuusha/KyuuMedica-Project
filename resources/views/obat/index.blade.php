@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Manage Obat</h4>
  </div>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Kemasan</th>
        <th>Harga</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($obat as $item)
      <tr>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->kemasan }}</td>
        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
        <td>
          <a href="{{ route('obat.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
          <form method="POST" action="{{ route('obat.destroy', $item->id) }}" class="d-inline delete-form">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
      button.addEventListener('click', function(e) {
        e.preventDefault();

        Swal.fire({
          title: 'Yakin ingin menghapus?',
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