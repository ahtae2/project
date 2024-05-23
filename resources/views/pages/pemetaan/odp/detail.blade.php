@extends('layouts.admin')

@section('title')
    Detail Optical Distribution Point
@endsection

@section('slug')
    Detail Optical Distribution Point
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2 font-weight-bold">Detail ODP</h3>
                <div class="button-title">
                    @if (auth()->user()->role == 'admin')
                    <a a href="{{ url('/pemetaan-odp/printdetail/'.$perangkat->id) }}" target="_blank">
                        <button type="button" class="btn bg-gradient-success btn-sm">
                        <i class="fas fa-file-pdf nav-icon"></i>
                            Cetak</button>
                    </a>
                    @endif
                </div>
              </div>
              <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Tanggal Pemetaan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $perangkat->created_at }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Nama Pemetaan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $perangkat->nama }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Provinsi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $perangkat->nama_provinsi }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Kota</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $perangkat->nama_kota }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Kecamatan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $perangkat->nama_kecamatan }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Alamat Pemetaan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $perangkat->alamat }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Latitude</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $perangkat->latitude }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Longitude</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $perangkat->longitude }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Keterangan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $perangkat->keterangan }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Nama ODP</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $perangkat->nama_odp }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Core</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $perangkat->core }}" disabled>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2 font-weight-bold">Tabel Data Pelanggan</h3>
                <div class="button-title">
                
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="table-detail-perangkat" class="table table-striped">
                    <thead class="bg-gradient-blue">
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Port</th>
                        <th>Teknisi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($pemetaanPelanggan as $index=>$value)
                        <tr>
                          <td>{{ ++$index }}</td>
                          <td>{{ Carbon\Carbon::parse($value->created_at)->format('Y-m-d') }}</td>
                          <td>{{ $value->nama }}</td>
                          <td>{{ $value->alamat }}</td>
                          <td>{{ $value->port }}</td>
                          <td>{{ $value->teknisi }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection