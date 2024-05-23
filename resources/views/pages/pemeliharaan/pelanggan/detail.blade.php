@extends('layouts.admin')

@section('title')
    Detail Pemeliharaan Pelanggan
@endsection

@section('slug')
    Detail Pemeliharaan Pelanggan
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Tanggal Pemetaan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $pelanggan->created_at }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Nama Pelanggan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $pelanggan->nama }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Alamat Pelanggan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $pelanggan->alamat }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Latitude</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $pelanggan->latitude }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Longitude</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $pelanggan->longitude }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Keterangan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $pelanggan->keterangan }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Nama ODP</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $pelanggan->nama_odp }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Port</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $pelanggan->port }}" disabled>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <table id="table-detail-perangkat" class="table table-striped">
                    <thead class="bg-gradient-blue">
                        <tr>
                          <th>No</th>
                          <th>Tgl Pemeliharaan</th>
                          <th>Nama Pelanggan</th>
                          <th>Keterangan</th>
                          <th>Catatan</th>
                          <th>Teknisi</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($pemeliharaanPelanggan as $index=>$value)
                            <tr>
                              <td>{{ ++$index }}</td>
                              <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                              <td>{{ $value->nama }}</td>
                              <td>{{ $value->keterangan }}</td>
                              <td>{{ $value->catatan == "" ? "-" : $value->catatan }}</td>
                              <td>{{ $value->teknisi }}</td>
                              </td>
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