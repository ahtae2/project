@extends('layouts.admin')

@section('title-head')
    | Pemeliharaan
@endsection

@section('title')
    Pemeliharaan
@endsection

@section('slug')
  Data Pemeliharaan
@endsection

@section('content')
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title mt-2 font-weight-bold">Data Pemeliharaan Pelanggan</h3>
        <div class="button-title">

        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="table-jadwal-pemeliharaan-pelanggan" class="table table-striped">
        <thead class="bg-gradient-blue">
        <tr>
          <th>No</th>
          <th>Tanggal Pemetaan</th>
          <th>Nama Pelanggan</th>
          <th>Umur Pemasangan</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          @foreach($pemetaanPelanggan as $index=>$value)
            <tr>
              <td>{{ ++$index }}</td>
              <td>{{ date('d-m-Y', strtotime($value->tanggal_pemetaan)) }}</td>
              <td>{{ $value->nama }}</td>
              <td>{{ date_diff(new \DateTime($value->tanggal_pemetaan), new \DateTime())->format("%d Hari") }}</td>
              <td>
                <a href="{{ route('pemeliharaan-pelanggan.detail', $value->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye nav-icon"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2 font-weight-bold">Tabel Data Pemeliharaan Pelanggan</h3>
          <div class="button-title">
            <a href="{{ url('/pemeliharaan-pelanggan/create') }}"><button type="button" class="btn bg-gradient-primary btn-sm"><i class="fas fa-plus nav-icon"></i>
              Tambah</button></a>

              <x-buttonprint></x-buttonprint>

        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        <table id="table-pemeliharaan-pelanggan" class="table table-striped">
          <thead class="bg-gradient-blue">
          <tr>
            <th>No</th>
            <th>Tgl Pemeliharaan</th>
            <th>Nama Pelanggan</th>
            <th>Keterangan</th>
            <th>Catatan</th>
            <th>Teknisi</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            @foreach($pemeliharaanPelanggan as $index=>$value)
              <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $value->created_at}}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->keterangan }}</td>
                <td>{{ $value->catatan == "" ? "-" : $value->catatan }}</td>
                <td>{{ $value->teknisi }}</td>
                <td>                                       
                  <form action="{{ route('pemeliharaan-pelanggan.destroy', $value->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('pemeliharaan-pelanggan.edit', $value->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit nav-icon"></i></a>
                    {{-- <a href="{{ route('pemeliharaan.detail', $value->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye nav-icon"></i></a> --}}
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"><i class="fas fa-trash nav-icon"></i></button>
                  </form>
                </td>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->

  <x-modalprint>
    @section('route')
      {{ route('pemeliharaan-pelanggan.exportpdf') }}
    @endsection
  </x-modalprint>
@endsection