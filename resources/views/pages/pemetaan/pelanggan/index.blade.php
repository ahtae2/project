@extends('layouts.admin')

@section('title')
    Data Pelanggan
@endsection

@section('slug')
  Pelanggan
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
        <h3 class="card-title mt-2 font-weight-bold">Tabel Data Pelanggan</h3>
          <div class="button-title">
            <a href="{{ url('/pemetaan-pelanggan/create') }}"><button type="button" class="btn bg-gradient-primary btn-sm"><i class="fas fa-plus nav-icon"></i>
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
        <table id="table-pemetaan-pelanggan" class="table table-striped">
          <thead class="bg-gradient-blue">
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Alamat</th>
            {{-- <th>Latitude</th> --}}
            {{-- <th>Longitude</th> --}}
            <th>Keterangan</th>
            <th>Nama ODP</th>
            {{-- <th>Port</th> --}}
            {{-- <th>Teknisi</th> --}}
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            @foreach($pemetaanPelanggan as $index=>$value)
              <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $value->created_at }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->alamat }}</td>
                {{-- <td>{{ $value->latitude }}</td> --}}
                {{-- <td>{{ $value->longitude }}</td> --}}
                <td>{{ $value->keterangan }}</td>
                <td>{{ $value->nama_petaodp }}</td>
                {{-- <td>{{ $value->port }}</td> --}}
                {{-- <td>{{ $value->teknisi }}</td> --}}
                <td>                                       
                  <form action="{{ route('pemetaan-pelanggan.destroy', $value->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <a href="{{ route('pemetaan-pelanggan.show', $value->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye nav-icon"></i></a>
                      <a href="{{ route('pemetaan-pelanggan.edit', $value->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit nav-icon"></i></a>
                      <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"><i class="fas fa-trash nav-icon"></i></button>
                  </form>
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
      {{ route('pemetaan-pelanggan.exportpdf') }}
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