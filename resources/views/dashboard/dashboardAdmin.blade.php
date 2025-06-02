{{-- resources/views/dashboard/dashboardAdmin.blade.php --}}
@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('content')
<div class="container-fluid">
  <h3>Dashboard Admin</h3>
  <div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $jumlahDokter }}</h3>
          <p>Dokter</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $jumlahPasien }}</h3>
          <p>Pasien</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $jumlahPoli }}</h3>
          <p>Poli</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ $jumlahObat }}</h3>
          <p>Obat</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection