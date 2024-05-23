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
            <div class="col-12 mt-5">
                <img width="100px" src="{{ url('/images/logo-circle.png') }}" class="mx-auto d-block">
                <h3 class="text-center"><b>Jadwal Pemeliharaan Berkala</b></h3>
                <h6 class="text-center">PT Radmila Pratama Multireka</h6><br>
                <p>Tanggal: {{ Carbon\Carbon::now()->format('Y-m-d') }}</p>
                <div class="card">
                  <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                    </div>
                    @endif
                    <table id="table-pemetaan-pelanggan" class="table table-striped">
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pemetaan</th>
                            <th>Nama Pemetaan Perangkat</th>
                            <th>Tanggal Terakhir Pemeliharaan</th>
                            <th>Pemeliharaan Selanjutnya</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($pemetaanPerangkat as $index=>$value)
                            <tr>
                            <td>{{ ++$index }}</td>
                            <td>{{ $value->tanggal_pemetaan }}</td>
                            <td>{{ $value->nama_pemetaan }}</td>
                            <td>{{ $value->tanggal_pemeliharaan ? $value->tanggal_pemeliharaan : "Belum Pernah Pemeliharaan" }}</td>
                            @if ($value->tanggal_pemeliharaan)
                                <td>
                                {{ date("Y-m-d", strtotime("+3 month", strtotime($value->tanggal_pemeliharaan))) }}
                                </td>
                            @else 
                                <td>{{ date("Y-m-d", strtotime("+3 month", strtotime        ($value->tanggal_pemetaan))) }}
                                </td>
                            @endif
                            </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
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