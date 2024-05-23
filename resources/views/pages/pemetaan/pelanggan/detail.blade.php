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
                <h3 class="card-title mt-2 font-weight-bold">Detail Pemetaan Pelanggan</h3>
                <div class="button-title">
                    @if (auth()->user()->role == 'admin')
                    <a a href="{{ url('/pemetaan-pelanggan/printdetail/'.$pemetaanPelanggan->id) }}" target="_blank">
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
                        <input type="text" class="form-control" value="{{ $pemetaanPelanggan->created_at }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $pemetaanPelanggan->nama }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Provinsi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $pemetaanPelanggan->nama_provinsi }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Kota</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $pemetaanPelanggan->nama_kota }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Kecamatan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $pemetaanPelanggan->nama_kecamatan }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Alamat Pemetaan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $pemetaanPelanggan->alamat }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Latitude</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $pemetaanPelanggan->latitude }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Longitude</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $pemetaanPelanggan->longitude }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Keterangan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $pemetaanPelanggan->keterangan }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Nama ODP</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $pemetaanPelanggan->nama_odp }}" disabled>
                    </div>
                </div>
            </div> 
        </div>
    </div>
@endsection