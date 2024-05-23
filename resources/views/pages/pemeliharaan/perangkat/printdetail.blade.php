<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title></title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12  mt-5">
                <img width="100px" src="{{ asset('/images/logo-circle.png') }}"
                    class="mx-auto d-block">
                <h3 class="text-center"><b>Data Pemetaan Optical Distribution Point</b></h3>
                <h6 class="text-center">PT Radmila Pratama Multireka</h6><br>
                <p>Tanggal Laporan: {{ Carbon\Carbon::now()->format('Y-m-d') }}</p>
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title mt-2 font-weight-bold">Detail ODP</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-left">ID Pemetaan</label>
                            <div class="col-sm-8">
                                <p class="form-control border-0 my-0">{{ $perangkat->id }}</p>
                            </div>
                        </div><hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-left">Tanggal Pemetaan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ $perangkat->created_at }}" disabled>
                            </div>
                        </div><hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-left">Nama Pemetaan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ $perangkat->nama }}" disabled>
                            </div>
                        </div><hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-left">Alamat Pemetaan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ $perangkat->alamat }}" disabled>
                            </div>
                        </div><hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-left">Latitude</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ $perangkat->latitude }}" disabled>
                            </div>
                        </div><hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-left">Longitude</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ $perangkat->longitude }}" disabled>
                            </div>
                        </div><hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-left">Keterangan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ $perangkat->keterangan }}" disabled>
                            </div>
                        </div><hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-left">Nama ODP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ $perangkat->nama_odp }}" disabled>
                            </div>
                        </div><hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-left">Core</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ $perangkat->core }}" disabled>
                            </div>
                        </div><hr>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title mt-2 font-weight-bold">Daftar Pelanggan</h6>
                    </div>
                    <div class="card-body">
                        <table id="table-pemetaan-odp" class="table table-striped" style="font-size: 12px;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tgl Pemeliharaan</th>
                                    <th>Foto</th>
                                    <th>Nama Pemetaan Perangkat</th>
                                    <th>Keterangan</th>
                                    <th>Catatan</th>
                                    <th>Teknisi</th>
                                  </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($pemeliharaan as $index=>$value)
                                    <tr>
                                      <td>{{ ++$index }}</td>
                                      <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                      <td><img width="50px" src="{{ url('/data_file/' . $value->foto) }}" class="img-circle"></td>
                                      <td>{{ $value->nama }}</td>
                                      <td>{{ $value->keterangan }}</td>
                                      <td>{{ $value->catatan == "" ? "-" : $value->catatan }}</td>
                                      <td>{{ $value->teknisi }}</td>
                                      </td>
                                    </tr>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row mt-5">
            <div class="col-md-6 text-center">
                <h5>Mengesahkan</h5><br>
                {{ $pimpinan["nama"] }}
                <p><b>Pimpinan</b></p>
            </div>
            <div class="col-md-6 text-center">
                <h5>Mengetahui</h5><br>
                {{ Auth::user()->nama }}
                <p><b>Helpdesk<b></p>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script>
        window.print()

    </script>
</body>

</html>
