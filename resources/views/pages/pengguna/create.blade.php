@extends('layouts.admin')

@section('title')
    Tambah Pengguna
@endsection

@section('slug')
    Tambah Pengguna
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => 'pengguna.store', 'method' => 'post', 'files' => true]) !!}
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
                        <label for="">Email</label>
                        {!! Form::email('email', null, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        {!! Form::password('password', ['class' => $errors->has('password') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        {!! Form::textarea('alamat', null, ['class' => $errors->has('alamat') ? 'form-control is-invalid' : 'form-control', 'cols' => "10", "rows" => "3"]) !!}
                        @error('alamat')
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
                        <label for="">Tanggal Lahir</label>
                        {!! Form::date('tanggal_lahir', null, ['class' => $errors->has('tanggal_lahir') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('tanggal_lahir')
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
                        <label for="">Jenis Kelamin</label>
                        {!! Form::select('jenis_kelamin', ['pria' => 'Pria', 'wanita' => 'Wanita'
                    ], 'pria', ['class' => $errors->has('jenis_kelamin') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        {!! Form::select('role', ['admin' => 'Admin', 'teknisi' => 'Teknisi', 'sales' => 'Sales', 'pimpinan' => 'Pimpinan'], 'teknisi', ['class' => $errors->has('role') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        {!! Form::file('foto', ['class' => $errors->has('foto') ? 'form-control-file is-invalid' : 'form-control-file', 'accept'=>"image/x-png,image/gif,image/jpeg"]) !!}
                        @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection