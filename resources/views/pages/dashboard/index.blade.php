@extends('layouts.admin')

@section('title-head') 
  | Dashboard
@endsection 

@section('title')
  Dashboard
@endsection

@section('content')
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-gradient-purple">
        <div class="inner">
          <h3>{{ $pengguna }}</h3>
          <p class="font-weight-bold">Pengguna</p>
        </div>
        <div class="icon">
          <i class="ion ion-person"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-gradient-blue">
        <div class="inner">
          <h3>{{ $pelanggan }}</h3>
          <p class="font-weight-bold">Pelanggan</p>
        </div>
        <div class="icon">
          <i class="fas fa-users fa-2x"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-gradient-green text-white">
        <div class="inner">
          <h3>{{ $jumlahPerangkat }}</h3>
          <p class="font-weight-bold">Perangkat</p>
        </div>
        <div class="icon">
          <i class="fas fa-hdd"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-gradient-red">
        <div class="inner">
        <h3>{{ $gangguan }}</h3>
          <p class="font-weight-bold">Gangguan</p>
        </div>
        <div class="icon">
          <i class="ion ion-arrow-graph-down-right"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <div class="row">
    {{-- <div class="col-md-4 float-left">
      <!-- BAR CHART -->
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Pelanggan Berdasarkan Kecamatan</h3>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="barChart" style="min-height: 285px; height: 285px; max-height: 285px; max-width: 100%;"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div> --}}
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div id="map" class="map"></div>
        </div>
      </div><!-- /.card -->
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <!-- USERS LIST -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title font-weight-bold">Pengguna Baru</h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <ul class="users-list clearfix">
            @foreach ($newPengguna as $value)    
            <li>
              <img style="height: 40px; width: 40px;" src="{{ url('/data_file/' . $value->foto) }}" alt="User Image">
              <a class="users-list-name" href="#">{{ $value->nama }}</a>
              <span class="users-list-date">{{ $value->created_at }}</span>
              <span class="users-list-date">{{ ucfirst($value->role) }}</span>
            </li>
            @endforeach
          </ul>
          <!-- /.users-list -->
        </div>
        <!-- /.card-body -->
        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'teknisi')
        <div class="card-footer clearfix">
          <a href="{{ url("/pengguna") }}" class="btn btn-sm btn-secondary float-right">Lihat Semua</a>
        </div>
        @endif
        <!-- /.card-footer -->
      </div>
      <!--/.card -->
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header border-transparent">
          <h3 class="card-title font-weight-bold">ODP Baru Ditambahkan</h3>

          <div class="card-tools">
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Model / Merek</th>
                <th>Core</th>
              </tr>
              </thead>
              <tbody>
                @foreach($perangkat as $index=>$value)
                <tr>
                  <td>{{ ++$index }}</td>
                  <td>{{ $value->nama }}</td>
                  <td>{{ $value->model }}</td>
                  <td>{{ $value->core }}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'teknisi')
        <div class="card-footer clearfix">
          <a href="{{ url("/perangkat-odp/create") }}" class="btn btn-sm btn-info float-left">Tambah ODP Baru</a>
          <a href="{{ url("/perangkat-odp/") }}" class="btn btn-sm btn-secondary float-right">Lihat Semua</a>
        </div>
        @endif
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  {{-- <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header border-transparent">
          <h3 class="card-title font-weight-bold">Pemetaan ODP Terakhir</h3>

          <div class="card-tools">
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Pemetaan</th>
                <th>Alamat ODP</th>
              </tr>
              </thead>
              <tbody>
                @foreach($newPemetaanPerangkat as $index=>$value)
                <tr>
                  <td>{{ ++$index }}</td>
                  <td>{{ $value->created_at }}</td>
                  <td>{{ $value->nama }}</td>
                  <td>{{ $value->alamat }}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'teknisi')
        <div class="card-footer clearfix">
          <a href="{{ url("/pemetaan-odp/create") }}" class="btn btn-sm btn-info float-left">Peta ODP Baru</a>
          <a href="{{ url("/pemetaan-odp/") }}" class="btn btn-sm btn-secondary float-right">Lihat Semua</a>
        </div>
        @endif
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header border-transparent">
          <h3 class="card-title font-weight-bold">ODP Baru Ditambahkan</h3>

          <div class="card-tools">
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Model / Merek</th>
                <th>Core / core</th>
              </tr>
              </thead>
              <tbody>
                @foreach($perangkat as $index=>$value)
                <tr>
                  <td>{{ ++$index }}</td>
                  <td>{{ $value->nama }}</td>
                  <td>{{ $value->model }}</td>
                  <td>{{ $value->core }}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'teknisi')
        <div class="card-footer clearfix">
          <a href="{{ url("/perangkat-odp/create") }}" class="btn btn-sm btn-info float-left">Tambah ODP Baru</a>
          <a href="{{ url("/perangkat-odp/") }}" class="btn btn-sm btn-secondary float-right">Lihat Semua</a>
        </div>
        @endif
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
  </div> --}}
@endsection

@section('script')
  {{-- var jumlahPelanggan = {!! json_encode($jumlahPelanggan) !!};

  console.log(jumlahPelanggan)

  var labels = []
  var data = []

  try {
    labels = JSON.parse(JSON.stringify(jumlahPelanggan)).reduce((acc, val)=>[...acc, val.nama], [])
    data = JSON.parse(JSON.stringify(jumlahPelanggan)).reduce((acc, val)=>[...acc, val.kecamatan], [])
  } catch (e){
    console.log("Invalid json")
  }

  var areaChartData = {
    labels  : labels,
    datasets: [
    {
        label               : 'Jumlah Pelanggan',
        backgroundColor     : 'rgba(0,128,0, 1)',
        borderColor         : 'rgba(0,128,0, 1)',
        pointRadius         : false,
        pointColor          : 'rgba(0,128,0, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(0,128,0,1)',
        data                : data
    },
    ]
  }

  //-------------
  //- BAR CHART -
  //-------------
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChartData = jQuery.extend(true, {}, areaChartData)
  var temp0 = areaChartData.datasets[0]
  barChartData.datasets[0] = temp0

  var barChartOptions = {
    responsive              : true,
    maintainAspectRatio     : false,
    datasetFill             : false,
    scales: {
      xAxes: [{
          ticks: {
              beginAtZero: true,
              userCallback: function(label, index, labels) {
                  // when the floored value is the same as the value we have a whole number
                  if (Math.floor(label) === label) {
                      return label;
                  }

              },
          }
      }],
    },
  }

  var barChart = new Chart(barChartCanvas, {
    type: 'bar', 
    data: barChartData,
    options: barChartOptions,
    type: 'horizontalBar',
  }) --}}

  var pemetaanODC = {!! json_encode($pemetaanODC) !!};
  tampilDataODC(pemetaanODC);

  var pemetaanPerangkat = {!! json_encode($pemetaanPerangkat) !!};
  tampilDataODP(pemetaanPerangkat);

  var pemetaanPelanggan = {!! json_encode($pemetaanPelanggan) !!};
  tampilDataPelanggan(pemetaanPelanggan);
@endsection