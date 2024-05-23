@extends('layouts.admin')

@section('title')
    Tambah Pelanggan
@endsection

@section('slug')
    Tambah Pelanggan
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => 'pelanggan.store', 'method' => 'post']) !!}
                    <div class="form-group">
                        <label for="">Nama</label>
                        {!! Form::text('nama', null, ['class' => $errors->has('nama') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        {!! Form::text('alamat', null, ['class' => $errors->has('alamat') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        {!! Form::date('tanggal_lahir', null, ['class' => $errors->has('tanggal_lahir') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('tanggal_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Kontak</label>
                        {!! Form::text('kontak', null, ['class' => $errors->has('kontak') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('kontak')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        {!! Form::email('email', null, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Identitas</label>
                        {!! Form::text('identitas', null, ['class' => $errors->has('identitas') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('identitas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Pekerjaan</label>
                        {!! Form::text('pekerjaan', null, ['class' => $errors->has('pekerjaan') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('pekerjaan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        {!! Form::select('jenis_kelamin', ['pria' => 'Pria', 'wanita' => "Wanita"], 'pria', ['class' => $errors->has('jenis_kelamin') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="paket">Paket</label>
                        {!! Form::select('paket_id', ['1' => 'Paket Lite', '2' => 'Paket Gold', '3' => 'Paket Platinum'], '1', ['class' => $errors->has('paket_id') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('paket_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>                        
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.card -->
    </div>
        
@endsection

@push('script')
    <script>
        window.action = 'submit'
    </script>
@endpush

@section('script')
  var dataODP = {!! json_encode($perangkat) !!};
  tampilDataODP(dataODP);
@endsection
