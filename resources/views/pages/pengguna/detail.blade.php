@extends('layouts.admin')

@section('title')
    Detail Pengguna
@endsection

@section('slug')
    Detail Pengguna
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2 font-weight-bold">Detail Pengguna</h3>
                <div class="button-title">
                    @if (auth()->user()->role == 'admin')
                        <a a href="{{ url('/pengguna/printdetail/'.$pengguna->id) }}" target="_blank">
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
                        <div class="mx-auto">
                            <img src="{{ url('/data_file/'.$pengguna->foto)}}" alt="" width="100" height="100">
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6 class="">ID Pengguna</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6 class="">{{ $pengguna->id }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Tanggal</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ $pengguna->created_at }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Nama</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ $pengguna->nama }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Email</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ $pengguna->email }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Alamat</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ $pengguna->alamat }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Kontak</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ $pengguna->kontak }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Tanggal Lahir</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ $pengguna->tanggal_lahir }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Identitas</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ $pengguna->identitas }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Jenis Kelamin</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ ucwords($pengguna->jenis_kelamin) }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Role</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ ucwords($pengguna->role) }}</h6>
                        </div>
                    </div><hr>
                </div>
            </div> 
        </div>
    </div>
@endsection