@extends('layouts.admin')

@section('title')
    Detail Optical Distribution Cabinet
@endsection

@section('slug')
    Detail Optical Distribution Cabinet
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="button-title">
                    @if (auth()->user()->role == 'admin')
                        <a a href="{{ url('/pemetaan-odc/printdetail/'.$odc->id) }}" target="_blank">
                            <button type="button" class="btn bg-gradient-success btn-sm">
                            <i class="fas fa-file-pdf nav-icon"></i>
                                Cetak</button>
                        </a>
                    @endif
                </div>
                <h3 class="card-title mt-2 font-weight-bold">Detail ODC</h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">ID Pemetaan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $odc->id }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Tanggal Pemetaan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $odc->created_at }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Nama Pemetaan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $odc->nama }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Provinsi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $odc->nama_provinsi }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Kota</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $odc->nama_kota }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Kecamatan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $odc->nama_kecamatan }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Alamat Pemetaan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $odc->alamat }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Latitude</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $odc->latitude }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Longitude</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $odc->longitude }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Keterangan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $odc->keterangan }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Nama ODC</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $odc->nama_odc }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Core</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $odc->core }}" disabled>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2 font-weight-bold">Tabel Data ODP</h3>
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
                      @foreach($pemetaanPerangkat as $index=>$value)
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

@push('script')
    <script>
        window.action = 'submit'
    </script>
@endpush

@section('script')
    {{-- var pemetaanODC = {!! json_encode($pemetaanODC) !!};
    tampilDataODC(pemetaanODC);

    var pemetaanPerangkat = {!! json_encode($pemetaanPerangkat) !!};
    tampilDataODP(pemetaanPerangkat);

    var pemetaanPelanggan = {!! json_encode($pemetaanPelanggan) !!};
    tampilDataPelanggan(pemetaanPelanggan); --}}
@endsection