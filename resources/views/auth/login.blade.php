@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <img src="/images/illustration.png" alt="" width="300">
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="">
                {{-- <div class="card-header font-weight-bold">{{ __('Sistem Informasi Data Teknis - Login') }}</div> --}}
                <div class="pt-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-8 mx-auto text-center">
                                <h3 class="font-weight-bold">Selamat Datang</h3>
                                <p class="text-secondary text-sm">Login dengan akun yang telah diverifikasi</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                            <div class="col-md-8 mx-auto">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror btn-bordered input-lg inputfield" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div class="col-md-8 mx-auto">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror btn-bordered input-lg inputfield" name="password" required autocomplete="current-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <div class="col-md-4 col-6 mx-auto mt-3">
                                <button type="submit" class="btn btn-primary btn-md btn-block btn-bordered font-weight-bold shadow" id="check" onClick="loading();">
                                    {{ __('LOGIN') }}
                                </button>
                                
                                
                                <button class="btn btn-danger btn-md btn-block btn-bordered font-weight-bold shadow" onclick="window.location.href = '/'">
                                    Kembali
                                </button>
                                </div>


                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 mx-auto text-center">
                                <p>Belum punya akun?<a href="/register" class="font-weight-bold" style="text-decoration: none"> Daftar</a></p>
                            </div>
                        </div>
                    </form>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
