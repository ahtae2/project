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
      <h3 class="card-title mt-2 font-weight-bold">Jadwal Pemeliharaan Perangkat Berkala</h3>
        <div class="button-title">
          @if (auth()->user()->role == 'admin' | auth()->user()->role == 'teknisi')
          <a href="{{ url("pemeliharaan/printjadwal") }}" target="_blank">
              <button type="button" class="btn bg-gradient-success btn-sm">
                <i class="fas fa-print nav-icon"></i>
                    Cetak Jadwal</button>
          </a>
          @endif
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="table-jadwal-pemeliharaan" class="table table-striped">
        <thead class="bg-gradient-blue">
        <tr>
          <th>No</th>
          <th>Tanggal Pemetaan</th>
          <th>Nama Pemetaan Perangkat</th>
          <th>Umur Pemasangan</th>
          <th>Tanggal Terakhir Pemeliharaan</th>
          <th>Pemeliharaan Selanjutnya</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          @foreach($pemetaanPerangkat as $index=>$value)
            <tr>
              <td>{{ ++$index }}</td>
              <td>{{ date('d-m-Y', strtotime($value->tanggal_pemetaan)) }}</td>
              <td>{{ $value->nama_pemetaan }}</td>
              <td>{{ date_diff(new \DateTime($value->tanggal_pemetaan), new \DateTime())->format("%d Hari") }}</td>
              <td>{{ $value->tanggal_pemeliharaan ? date('d-m-Y', strtotime($value->tanggal_pemeliharaan)) : "Belum Pernah Pemeliharaan" }}</td>
              @if ($value->tanggal_pemeliharaan)
                <td>
                  {{ date("Y-m-d", strtotime("+3 month", strtotime($value->tanggal_pemeliharaan))) }}
                  {{"(" . date_diff(new \DateTime(date("Y-m-d", strtotime("+3 month", strtotime($value->tanggal_pemeliharaan)))), new \DateTime())->format("%m Bulan %d Hari Lagi") .")" }}</td>
              @else 
                <td>{{ date("Y-m-d", strtotime("+3 month", strtotime($value->tanggal_pemetaan))) }}
                  {{"(" . date_diff(new \DateTime(date("Y-m-d", strtotime("+3 month", strtotime($value->tanggal_pemetaan)))), new \DateTime())->format("%m Bulan %d Hari Lagi") .")" }}</td>
              @endif
              </td>
              <td>
                <a href="{{ route('pemeliharaan.show', $value->id_petaodp) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye nav-icon"></i></a>
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
        <h3 class="card-title mt-2 font-weight-bold">Tabel Data Pemeliharaan Perangkat</h3>
          <div class="button-title">
            <a href="{{ url('/pemeliharaan/create') }}"><button type="button" class="btn bg-gradient-primary btn-sm"><i class="fas fa-plus nav-icon"></i>
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
        <table id="table-pemeliharaan" class="table table-striped">
          <thead class="bg-gradient-blue">
          <tr>
            <th>No</th>
            <th>Tgl Pemeliharaan</th>
            <th>Foto</th>
            <th>Nama Pemetaan Perangkat</th>
            <th>Keterangan</th>
            <th>Catatan</th>
            <th>Teknisi</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            @foreach($pemeliharaan as $index=>$value)
              <tr>
                <td>{{ ++$index }}</td>
                <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                <td><img width="50px" src="{{ url('/data_file/' . $value->foto) }}" class="img-circle"></td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->keterangan }}</td>
                <td>{{ $value->catatan == "" ? "-" : $value->catatan }}</td>
                <td>{{ $value->teknisi }}</td>
                <td>                                       
                  <form action="{{ route('pemeliharaan.destroy', $value->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('pemeliharaan.edit', $value->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit nav-icon"></i></a>
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
      {{ route('pemeliharaan.exportpdf') }}
    @endsection
  </x-modalprint>
@endsection