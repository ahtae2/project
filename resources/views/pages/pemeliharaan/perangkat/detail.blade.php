@extends('layouts.admin')

@section('title')
    Detail Pemeliharaan Optical Distribution Point
@endsection

@section('slug')
    Detail Pemeliharaan Optical Distribution Point
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2 font-weight-bold">Detail Pemeliharaan Perangkat</h3>
                <div class="button-title">
                    @if (auth()->user()->role == 'admin')
                    <a a href="{{ url('/pemeliharaan/printdetail/'.$perangkat->id) }}" target="_blank">
                        <button type="button" class="btn bg-gradient-success btn-sm">
                        <i class="fas fa-file-pdf nav-icon"></i>
                            Cetak</button>
                    </a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Tanggal Pemetaan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $perangkat->created_at }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Nama Pemetaan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $perangkat->nama }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Alamat Pemetaan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $perangkat->alamat }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Latitude</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $perangkat->latitude }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Longitude</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $perangkat->longitude }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Keterangan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $perangkat->keterangan }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Nama ODP</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $perangkat->nama_odp }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-left">Core</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $perangkat->core }}" disabled>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="col-sm-12">
        <!-- BAR CHART -->
        <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Historis Pemeliharaan</h3>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2 font-weight-bold">Tabel Data Pemeliharaan Perangkat</h3>
            </div>
            <div class="card-body">
                <table id="table-detail-perangkat" class="table table-striped">
                    <thead class="bg-gradient-blue">
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
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        window.action = 'submit'
    </script>
@endpush

@section('script')
    var pemeliharaan = ({!! json_encode($pemeliharaan) !!});
    console.log(pemeliharaan);
    
    dataLancar = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    dataGangguan = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

    var months = {};
    for (var i=0; i < pemeliharaan.length; i++) {
        var obj = pemeliharaan[i];
        var date = new Date(obj.created_at);
        var month = date.getMonth();
        if (months[month]) {
            months[month].push(obj);  // already have a list- append to it
        }
        else {
            months[month] = [obj]; // no list for this month yet - create a new one
        }
    }

    console.log(months);

    for (i=0; i < 12; i++) {
        if (months[i] == null){

        } else {
            for (j=0; j < months[i].length; j++) {
                if(months[i][j].keterangan == "Lancar") {
                    dataLancar[i] = dataLancar[i] + 1;
                } else {
                    dataGangguan[i] = dataGangguan[i] + 1;
                }
            }
        }
    }

    console.log(dataLancar);
    console.log(dataGangguan);

    {{-- console.log(months);

    console.log("Items of January are ", months[0]);
    console.log("Items of Juli are ", months[6]); --}}

    {{-- pemeliharaan.forEach(element => {
        if (element.created_at.split('-')[1] == '01') {
            if(element.keterangan == "Lancar") {
                dataLancar.push(1);
            } else if (element.keterangan == "Gangguan") {
                dataGangguan.push(1);
            }
        } else {
            dataLancar.push(0);
            dataGangguan.push(0);
        }

        if(element.created_at.split('-')[1] == '02') {
            if(element.keterangan == "Lancar") {
                dataLancar.push(1);
            } else if (element.keterangan == "Gangguan") {
                dataGangguan.push(1);
            }
        } else {
            dataLancar.push(0);
            dataGangguan.push(0);
        }

        if (element.created_at.split('-')[1] == '03') {
            if(element.keterangan == "Lancar") {
                dataLancar.push(1);
            } else if (element.keterangan == "Gangguan") {
                dataGangguan.push(1);
            }
        } else {
            dataLancar.push(0);
            dataGangguan.push(0);
        }

        if (element.created_at.split('-')[1] == '04') {
            if(element.keterangan == "Lancar") {
                dataLancar.push(1);
            } else if (element.keterangan == "Gangguan") {
                dataGangguan.push(1);
            }
        } else {
            dataLancar.push(0);
            dataGangguan.push(0);
        }

        if (element.created_at.split('-')[1] == '05') {
            if(element.keterangan == "Lancar") {
                dataLancar.push(1);
            } else if (element.keterangan == "Gangguan") {
                dataGangguan.push(1);
            }
        } else {
            dataLancar.push(0);
            dataGangguan.push(0);
        }

        if (element.created_at.split('-')[1] == '06') {
            if(element.keterangan == "Lancar") {
                dataLancar.push(1);
            } else if (element.keterangan == "Gangguan") {
                dataGangguan.push(1);
            }
        } else {
            dataLancar.push(0);
            dataGangguan.push(0);
        }

        if (element.created_at.split('-')[1] == '07') {
            if(element.keterangan == "Lancar") {
                dataLancar.push(1);
            } else if (element.keterangan == "Gangguan") {
                dataGangguan.push(1);
            }
        } else {
            dataLancar.push(0);
            dataGangguan.push(0);
        }

        if (element.created_at.split('-')[1] == '08') {
            if(element.keterangan == "Lancar") {
                dataLancar.push(1);
            } else if (element.keterangan == "Gangguan") {
                dataGangguan.push(1);
            }
        } else {
            dataLancar.push(0);
            dataGangguan.push(0);
        }
    }) --}}

    var areaChartData = {
        labels  : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [
        {
            label               : 'Gangguan',
            backgroundColor     : 'rgba(255,0,0,0.9)',
            borderColor         : 'rgba(255,0,0,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(255,0,0,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(255,0,0,1)',
            data                : dataGangguan
        },
        {
            label               : 'Lancar',
            backgroundColor     : 'rgba(0,128,0, 1)',
            borderColor         : 'rgba(0,128,0, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(0,128,0, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(0,128,0,1)',
            data                : dataLancar
        },
        ]
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })
    {{-- var pemetaanODC = {!! json_encode($pemetaanODC) !!};
    tampilDataODC(pemetaanODC);

    var pemetaanPerangkat = {!! json_encode($pemetaanPerangkat) !!};
    tampilDataODP(pemetaanPerangkat);

    var pemetaanPelanggan = {!! json_encode($pemetaanPelanggan) !!};
    tampilDataPelanggan(pemetaanPelanggan); --}}
@endsection