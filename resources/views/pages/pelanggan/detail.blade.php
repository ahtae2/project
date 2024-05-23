@extends('layouts.admin')

@section('title')
    Detail Pelanggan
@endsection

@section('slug')
    Detail Pelanggan
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2 font-weight-bold">Detail Pelanggan</h3>
                <div class="button-title">
                    @if (auth()->user()->role == 'admin')
                        <a a href="{{ url('/pelanggan/printdetail/'.$pelanggan->id) }}" target="_blank">
                            <button type="button" class="btn bg-gradient-success btn-sm">
                            <i class="fas fa-file-pdf nav-icon"></i>
                                Cetak</button>
                        </a>
                    @endif
                  </div>
              </div>
              <!-- /.card-header -->
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6 class="">ID pelanggan</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6 class="">{{ $pelanggan->id }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Tanggal</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ $pelanggan->created_at }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Nama</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ $pelanggan->nama }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Email</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ $pelanggan->email }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Alamat</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ $pelanggan->alamat }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Kontak</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ $pelanggan->kontak }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Tanggal Lahir</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ $pelanggan->tanggal_lahir }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Identitas</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ $pelanggan->identitas }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Jenis Kelamin</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ $pelanggan->jenis_kelamin == 'w' ? 'Wanita' : 'Pria' }}</h6>
                        </div>
                    </div><hr>
                </div>
            </div> 
        </div>
    </div>
@endsection