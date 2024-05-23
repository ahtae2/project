@extends('layouts.admin')

@section('title')
    Detail ODP
@endsection

@section('slug')
    Detail ODP
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2 font-weight-bold">Detail ODP</h3>
                <div class="button-title">
                    @if (auth()->user()->role == 'admin')
                        <a a href="{{ url('/perangkat-odc/printdetail/'.$perangkat->id) }}" target="_blank">
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
                            <h6 class="">ID ODC</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6 class="">{{ $perangkat->id }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Tanggal</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ $perangkat->created_at }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Nama</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ $perangkat->nama }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Model</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ $perangkat->model }}</h6>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>Core</h6>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4">
                            <h6>{{ $perangkat->core }}</h6>
                        </div>
                    </div><hr>
                </div>
            </div> 
        </div>
    </div>
@endsection