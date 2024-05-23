@extends('layouts.admin')

@section('title-head')
    | Pengadaan
@endsection

@section('title')
    Pengadaan
@endsection

@section('slug')
  Data Pengadaan
@endsection

@section('content')
<div class="col-12">
  <div class="card ">
    <div class="card-body">
      <div id="map" class="map"></div>
    </div>
  </div><!-- /.card -->
</div>
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2 font-weight-bold">Tabel Data Pengadaan Perangkat Pelanggan</h3>
          <div class="button-title">
            <a href="{{ url('/pengadaan/create') }}"><button type="button" class="btn bg-gradient-primary btn-sm"><i class="fas fa-plus nav-icon"></i>
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
        <table id="table-pengadaan" class="table table-striped">
          <thead class="bg-gradient-blue">
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Sales</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            @foreach($pengadaan as $index=>$value)
              <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $value->created_at }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->alamat }}</td>
                <td>{{ $value->latitude }}</td>
                <td>{{ $value->longitude }}</td>
                <td>{{ $value->sales }}</td>
                <td>                                       
                  <form action="{{ route('pengadaan.destroy', $value->id) }}" method="post">
                    @csrf
                    @method('DELETE')                      
                    <a href="{{ route('pengadaan.edit', $value->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit nav-icon"></i></a>
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
      {{ route('pengadaan.exportpdf') }}
    @endsection
  </x-modalprint>
@endsection

@section('script')
  var pemetaanODC = {!! json_encode($pemetaanODC) !!};
  tampilDataODC(pemetaanODC);

  var pemetaanPerangkat = {!! json_encode($pemetaanPerangkat) !!};
  tampilDataODP(pemetaanPerangkat);

  var pemetaanPelanggan = {!! json_encode($pemetaanPelanggan) !!};
  tampilDataPelanggan(pemetaanPelanggan);
@endsection