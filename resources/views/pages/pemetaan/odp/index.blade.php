@extends('layouts.admin')

@section('title')
    Pemetaan ODP
@endsection

@section('slug')
    Data ODP
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
        <h3 class="card-title mt-2 font-weight-bold">Tabel Data Pemetaan Perangkat</h3>
        <div class="button-title">
          <a href="{{ url('/pemetaan-odp/create') }}">
            <button type="button" class="btn bg-gradient-primary btn-sm">
              <i class="fas fa-plus nav-icon"></i>
                  Tambah</button>
          </a>
        
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
        <table id="table-pemetaan-odp" class="table table-striped">
          <thead class="bg-gradient-blue">
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Foto</th>
            <th>Nama Pemetaan</th>
            {{-- <th>Kecamatan</th> --}}
            <th>Alamat ODP</th>
            {{-- <th>Latitude</th> --}}
            {{-- <th>Longitude</th> --}}
            <th>Keterangan</th>
            <th>Teknisi</th>
            {{-- <th>Nama ODP</th> --}}
            {{-- <th>Nama ODC</th> --}}
            {{-- <th>Port</th> --}}
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            @foreach($pemetaanPerangkat as $index=>$value)
              <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $value->created_at }}</td>
                <td><img width="50px" src="{{ url('/data_file/' . $value->foto) }}" class="img-circle"></td>
                <td>{{ $value->nama }}</td>
                {{-- <td>{{ $value->nama_kecamatan }}</td> --}}
                <td>{{ $value->alamat }}</td>
                {{-- <td>{{ $value->latitude }}</td> --}}
                {{-- <td>{{ $value->longitude }}</td> --}}
                <td>{{ $value->keterangan }}</td>
                <td>{{ $value->teknisi }}</td>
                {{-- <td>{{ $value->nama_odp }}</td> --}}
                {{-- <td>{{ $value->nama_odc }}</td> --}}
                {{-- <td>{{ $value->port }}</td> --}}
                <td>                                       
                  <form action="{{ route('pemetaan-odp.destroy', $value->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <a href="{{ route('pemetaan-odp.show', $value->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye nav-icon"></i></a>
                      <a href="{{ route('pemetaan-odp.edit', $value->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit nav-icon"></i></a>
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
      {{ route('pemetaan-odp.exportpdf') }}
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