@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="">
                {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                <div class="pt-5">
                    {!! Form::open(['route' => 'register', 'method' => 'post', 'files' => true]) !!}
                        <div class="form-group row">
                            <div class="col-md-6 mx-auto text-center">
                                <h1 class="font-weight-bold">Register</h1>
                                <p class="text-secondary text-sm">Buat akun untuk bisa menggunakan sistem</p>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror btn-bordered" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror btn-bordered" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror btn-bordered" name="password" required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <input id="password-confirm" type="password" class="form-control btn-bordered" name="password_confirmation" required autocomplete="new-password" placeholder="Password Confirm">
                            </div>
                        </div>

                        <div class="form-group">
                            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror btn-bordered" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus placeholder="Alamat">

                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                    <input id="kontak" type="text" class="form-control @error('kontak') is-invalid @enderror btn-bordered" name="kontak" value="{{ old('kontak') }}" required autocomplete="kontak" autofocus placeholder="Kontak">

                                    @error('kontak')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group col-md-4">
                                    <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror btn-bordered" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required autocomplete="tanggal_lahir" autofocus placeholder="Tanggal Lahir" onfocus="(this.type='date')" onblur="(this.type='text')">

                                    @error('tanggal_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group col-md-4">
                                    <input id="identitas" type="text" class="form-control @error('identitas') is-invalid @enderror btn-bordered" name="identitas" value="{{ old('identitas') }}" required autocomplete="identitas" autofocus placeholder="KTP / SIM">

                                    @error('identitas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group">
                                <select name="jenis_kelamin" class="form-control btn-bordered">
                                    <option value="pria">Pria</option>
                                    <option value="wanita">wanita</option>
                                </select>
                                @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                        <div class="form-group">
                                <select name="role" class="form-control btn-bordered">
                                    <option value="teknisi">Teknisi</option>
                                    <option value="sales">Sales</option>
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
                            <label for="">Foto</label><br>
                            <input id="foto" type="file" name="foto" required accept="image/x-png,image/gif,image/jpeg">
                    
                            @if ($errors->has('foto'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('foto') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 col-6 mx-auto">
                                <button type="submit" class="btn btn-primary btn-md btn-block btn-bordered shadow">
                                    {{ __('Register') }}
                                </button>
                                <button class="btn btn-danger btn-md btn-block btn-bordered font-weight-bold shadow" onclick="window.location.href = '/'">
                                    Kembali
                                </button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 mx-auto text-center">
                                <p>Sudah punya akun?<a href="/login" class=" font-weight-bold" style="text-decoration: none"> Login</a></p>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
