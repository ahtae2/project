<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title></title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
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
              <!-- /.col -->
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
        window.print()
    </script>
    </body>
</html>