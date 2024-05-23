<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="{{ url('/manifest.json') }}">
    <meta name="theme-color" content="#fff" />

    <title>Radmila - Home</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 90vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .links a:hover,
        .links a:focus {
            color: blue;
        }

        .background-gradient-blue {
            background: #36D1DC;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #4375e2, #24d1dd);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #4375e2, #24d1dd);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        .text-white-alpha {
            color: rgba(255, 255, 255, 0.8);
        }

        .home-background {
            /* background-image: url("/images/home-background.jpg"); */
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("/images/back.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        #main-title {
            font-family: 'Poppins', sans-serif;
            font-size: 3rem;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            margin: 0;
        }

        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            #main-title {
                padding-left: 1rem;
                font-size: 2.5rem;
            }
        }

        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) {
            #main-title {
                padding-left: 1rem;
                font-size: 2rem;
            }
        }

        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {
            #main-title {
                padding-left: 1rem;
                font-size: 3.5rem;
            }
           .card-header {
            background-color: rgba(255, 255, 255, 0.5); /* Mengatur warna latar belakang menjadi putih transparan */
            border-bottom: 2px solid #007bff; /* Mengubah warna border menjadi biru */
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan */
            font-family: 'Poppins', sans-serif; /* Mengubah font */
            font-size: 1.25rem; /* Menambahkan ukuran font */
            font-weight: 600; /* Menambahkan ketebalan font */
            color: #007bff; /* Mengubah warna teks menjadi biru */
            padding: 1rem; /* Menambahkan padding */
            border-radius: 0.5rem 0.5rem 0 0; /* Menambahkan radius sudut atas */
        }
        .card-header h4 {
            font-size: 1.5rem;
            margin: 0;
            display: flex;
            align-items: center;
        }
        .card-header .icon {
            margin-left: 10px;
            color: #0485f5;
        }
        .pricing-card-title {
            font-size: 2.5rem;
        }
        .card-body ul {
            font-size: 1rem;
            padding-left: 0;
        }
        .card-body ul li {
            margin-bottom: 10px;
        }
        .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s;
        }
        .btn-primary {
            background-color: #1175cc;
            border-color: #6c757d;
        }
        .btn-primary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .icon-feature {
            color: #6c757d;
            margin-right: 8px;
        }
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }
        .navbar-brand img {
            margin-right: 1px;
            margin-left: 30px;
        }
        .navbar-nav .nav-link {
            color: #555;
            transition: color 0.3s;
        }
        .navbar-nav .nav-link:hover {
            color: #007bff;
        }
        .navbar-toggler {
            border: none;
        }
        .navbar-toggler:focus {
            outline: none;
            box-shadow: none;
        }
        .nav-icon {
            margin-right: 8px;
        }
        .full-height {
            height: 100vh;
        }
        .font-weight-bold {
            font-weight: bold;
        }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('/images/rad.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
            <div class="d-inline font-weight-bold">Radmila</div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link font-weight-bold" href="{{ url('#') }}">
                        <i class="fas fa-home nav-icon"></i>Home <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="{{ url('/fibermap') }}">
                        <i class="fas fa-map nav-icon"></i>Fiber Map
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="{{ url('/login') }}">
                        <i class="fas fa-sign-in-alt nav-icon"></i>Login
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    

    <div class="flex-center position-ref full-height home-background text-white">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1 class="font-weight-bold" id="main-title">JANUS</h1>
                    <h1 class="font-weight-bold" id="main-title">Jejaring Nusantara</h1>
                </div>
                <div class="col-6"></div>
            </div>
        </div>
    </div>

    <!-- Modal Start Packet lite -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => ['pelanggan.daftar.subscription', 'name' => 'lite-package'], 'method' => 'post']) !!}
                    {!! Form::hidden('paket_id', '1') !!}
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
                        {!! Form::date('tanggal_lahir', null, [
                            'class' => $errors->has('tanggal_lahir') ? 'form-control is-invalid' : 'form-control',
                        ]) !!}
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
                        {!! Form::text('identitas', null, [
                            'class' => $errors->has('identitas') ? 'form-control is-invalid' : 'form-control',
                        ]) !!}
                        @error('identitas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Pekerjaan</label>
                        {!! Form::text('pekerjaan', null, [
                            'class' => $errors->has('pekerjaan') ? 'form-control is-invalid' : 'form-control',
                        ]) !!}
                        @error('pekerjaan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        {!! Form::select('jenis_kelamin', ['pria' => 'Pria', 'wanita' => 'Wanita'], 'pria', [
                            'class' => $errors->has('jenis_kelamin') ? 'form-control is-invalid' : 'form-control',
                        ]) !!}
                        @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->

        <!-- Modal Start Packet Gold -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => ['pelanggan.daftar.subscription', 'name' => 'lite-package'], 'method' => 'post']) !!}
                    {!! Form::hidden('paket_id', '2') !!}
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
                        {!! Form::date('tanggal_lahir', null, [
                            'class' => $errors->has('tanggal_lahir') ? 'form-control is-invalid' : 'form-control',
                        ]) !!}
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
                        {!! Form::text('identitas', null, [
                            'class' => $errors->has('identitas') ? 'form-control is-invalid' : 'form-control',
                        ]) !!}
                        @error('identitas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Pekerjaan</label>
                        {!! Form::text('pekerjaan', null, [
                            'class' => $errors->has('pekerjaan') ? 'form-control is-invalid' : 'form-control',
                        ]) !!}
                        @error('pekerjaan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        {!! Form::select('jenis_kelamin', ['pria' => 'Pria', 'wanita' => 'Wanita'], 'pria', [
                            'class' => $errors->has('jenis_kelamin') ? 'form-control is-invalid' : 'form-control',
                        ]) !!}
                        @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->

            <!-- Modal Start Packet Platinum -->
            <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registrasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['route' => ['pelanggan.daftar.subscription', 'name' => 'lite-package'], 'method' => 'post']) !!}
                        {!! Form::hidden('paket_id', '3') !!}
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
                            {!! Form::date('tanggal_lahir', null, [
                                'class' => $errors->has('tanggal_lahir') ? 'form-control is-invalid' : 'form-control',
                            ]) !!}
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
                            {!! Form::text('identitas', null, [
                                'class' => $errors->has('identitas') ? 'form-control is-invalid' : 'form-control',
                            ]) !!}
                            @error('identitas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Pekerjaan</label>
                            {!! Form::text('pekerjaan', null, [
                                'class' => $errors->has('pekerjaan') ? 'form-control is-invalid' : 'form-control',
                            ]) !!}
                            @error('pekerjaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            {!! Form::select('jenis_kelamin', ['pria' => 'Pria', 'wanita' => 'Wanita'], 'pria', [
                                'class' => $errors->has('jenis_kelamin') ? 'form-control is-invalid' : 'form-control',
                            ]) !!}
                            @error('jenis_kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal End -->

    <div class="container">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Internet Broadband</h1>
            <p class="lead">"Internet sekarang ini menjadi salah satu kebutuhan poko semua orang . Semua aspek kehidupan saat ini hampir semuanya terhubung dengan layanan internet. Dukung jaringan internet anda dengan menggunakan Janus . Segera berlangganan untuk mendapatkan internet ngabret tanpa ribet</p>
        </div>
    </div>
    <div class="container">
        <div class="card-deck mb-3 text-center">
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">JANUS-LITE <i class="fas fa-signal icon"></i></h4>
            </div>
            <div class="card-body">
              <h1 class="card-title pricing-card-title">Rp.200.000 <small class="text-muted">/ Bulan</small></h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>Kecepatan internet 8 Mbps   </li>
              </ul>
              <button type="button" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#exampleModal">Berlangganan</button>
            </div>
          </div>
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">JANUS-GOLD <i class="fas fa-crown icon"></i></h4>
            </div>
            <div class="card-body">
              <h1 class="card-title pricing-card-title">Rp.300.000 <small class="text-muted">/ Bulan</small></h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>Kecepatan internet 15 Mbps</li>
              </ul>
              <button type="button" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#exampleModal2">Berlangganan</button>
            </div>
          </div>
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">JANUS-PLATINUM <i class="fas fa-gem icon"></i></h4>
            </div>
            <div class="card-body">
              <h1 class="card-title pricing-card-title">Rp.450.000 <small class="text-muted">/ Bulan</small></h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>Kecepatan internet 30 Mbps</li>
              </ul>
              <button type="button" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#exampleModal3">Berlangganan</button>
            </div>
          </div>
        </div>
    </div>
    <div class="container">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <!-- Block level -->
            <div class="row">
                <div class="col-2 text-truncate">
                    Catatan:
                </div>
                <div class="col-10">
                    <p class="text-justify">Discount untuk Sekolah dan dunia pendidikan, *syarat dan ketentuan berlaku</p>
                    <p class="text-justify">Harga Flat selama kontrak berlangganan</p>
                    <p class="text-justify">Biaya Deposit perangkat Rp.400.000,-</p>
                </div>
            </div>
        </div>
    </div>
        


    {{-- Footer --}}
    <footer class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    {{-- <h5>Resources</h5><br> --}}
                    <img src="{{ asset('/images/rad.png') }}" width="30" height="30"
                        class="d-inline-block align-top" alt="">
                    <div class="d-inline font-weight-bold">
                        PT Radmila
                    </div><br><br>
                    <ul class="list-unstyled text-small font-weight-bold" style="font-size: small;">
                        <li>PT Radmila Pratama Multireka adalah perusahaan yang bergerak dibidang teknologi informasi,
                            yang berfokus pada pelanggan perusahaan telekomunikasi dan seluler di Indonesia.</li>
                    </ul>

                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col">
                            <div class="d-inline font-weight-bold">
                                LOKASI
                            </div><br><br>
                            <ul class="list-unstyled text-small font-weight-bold" style="font-size: small;">
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i> Jl. R.A.A. Martanegara No. 56,
                                    Turangga Lengkong, Bandung, Jawa Barat, 40265.</li>
                            </ul>
                        </div>
                        <div class="col">
                            <div class="d-inline font-weight-bold">
                                SOSIAL MEDIA
                            </div><br><br>
                            <ul class="list-unstyled text-small">
                                <li><a href="#"></a><i class="fa fa-facebook-square" aria-hidden="true"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                    <p>
                        &copy; <span id="year">2019</span> <a
                            href="{{ url('https://dikalangoding.com') }}">Dikalangoding </a>. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script>
        var d = new Date();
        document.getElementById("year").innerHTML = d.getFullYear();
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
