@extends('layouts.admin')

@section('title-head') 
  | Map
@endsection 

@section('title')
  Map
@endsection

@section('content')
  <div class="col-lg-8">
    <div class="card">
        <div class="card-body">
          <div id="map" class="map" style="height: 95vh;"></div>
        </div>
      </div><!-- /.card -->
  </div>
  <!-- ./col -->
  <div class="col-lg-4">
    <div class="row">
      <div class="col-lg-12">
        <!-- BAR CHART -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Filter Map</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('map.index') }}" method="post">
                  @csrf
                  <div class="checkbox">
                      <input type="checkbox" name="odc" id="odc" {{ $odc ? 'checked' : ''}}>
                      <label for="odc">Tampilkan ODC</label>
                  </div>
                  <div class="checkbox">
                      <input type="checkbox" name="odp" id="odp" {{ $odp ? 'checked' : ''}}>
                      <label for="odp">Tampilkan ODP</label>
                  </div>
                  <div class="checkbox">
                      <input type="checkbox" name="pelanggan" id="pelanggan" {{ $pelanggan ? 'checked' : ''}}>
                      <label for="pelanggan">Tampilkan Pelanggan</label>
                  </div>
                  <div class="form-group">
                    <label for="">Provinsi</label>
                    <select name="province" id="province" class="form-control" style="width: 100%;">
                        <option value="">--Pilih Provinsi--</option>
                        @foreach ($provinces as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Kota</label>
                    <select name="city" id="city" class="form-control" style="width: 100%;">
                        <option value="">--Pilih Kota--</option>
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="">Kecamatan</label>
                      <select name="district" id="district" class="form-control" style="width: 100%;">
                          <option value="">--Pilih Kecamatan--</option>
                      </select>
                  </div>
                  {{-- <div class="form-group">
                    <label for="kecamatan">Pilih Kecamatan: </label>
                    <select id="kecamatan" name="kecamatan" class="form-control">
                        @foreach ($kecamatan as $value)
                        @if ($currentKecamatan->name == $value->name)
                          <option selected value="{{ $value->id }}">{{ $value->name }}</option>
                        @endif
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                  </div> --}}
                  <button type="submit" class="btn btn-primary float-left">Submit</button>
                </form>
                <button class="btn btn-secondary ml-1" onClick="window.location.href=window.location.href">Reset</button>
            </div>
            <!-- /.card-body -->
        </div>
      </div>
      <!-- ./col -->  
      <div class="col-lg-12">
        <!-- BAR CHART -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Data Berdasarkan Kecamatan</h3>
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="barChart" style="min-height: 285px; height: 285px; max-height: 285px; max-width: 100%;"></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
  </div>
  {{-- <div class="row">
    <div class="col-md-4">
      <!-- PIE CHART -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Kondisi ODC</h3>
        </div>
        <div class="card-body">
          <canvas id="pieChartODC" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <div class="col-md-4">
      <!-- PIE CHART -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Kondisi ODP</h3>
        </div>
        <div class="card-body">
          <canvas id="pieChartODP" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <div class="col-md-4">
      <!-- PIE CHART -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Kondisi Perangkat Pelanggan</h3>
        </div>
        <div class="card-body">
          <canvas id="pieChartPelanggan" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div> --}}
@endsection

@section('script')
  $(function () {
    $('#province').on('change', function () {
        axios.post('{{ route('wilayah.getCity') }}', {id: $(this).val()})
            .then(function (response) {
                $('#city').empty();

                $.each(response.data, function (id, name) {
                    $('#city').append(new Option(name, id))
                })
            });
    });
  });
  $(function () {
    $('#city').on('change', function () {
        axios.post('{{ route('wilayah.getDistrict') }}', {id: $(this).val()})
            .then(function (response) {
                $('#district').empty();

                $.each(response.data, function (id, name) {
                    $('#district').append(new Option(name, id))
                })
            });
    });
  });

  var jumlahODC = {!! json_encode($jumlahODC) !!};
  var jumlahODP = {!! json_encode($jumlahODP) !!};
  var jumlahPelanggan = {!! json_encode($jumlahPelanggan) !!};

  console.log(jumlahPelanggan)

  var labels = []
  var dataODC = []
  var dataODP = []
  var dataPelanggan = []

  try {
    labels = JSON.parse(JSON.stringify(jumlahPelanggan)).reduce((acc, val)=>[...acc, val.nama], [])
    dataODC = JSON.parse(JSON.stringify(jumlahODC)).reduce((acc, val)=>[...acc, val.kecamatan], [])
    dataODP = JSON.parse(JSON.stringify(jumlahODP)).reduce((acc, val)=>[...acc, val.kecamatan], [])
    dataPelanggan = JSON.parse(JSON.stringify(jumlahPelanggan)).reduce((acc, val)=>[...acc, val.kecamatan], [])
  } catch (e){
    console.log("Invalid json")
  }

  var areaChartData = {
    labels  : labels,
    datasets: [
    {
        label               : 'Jumlah ODC',
        backgroundColor     : '#fd7e14',
        borderColor         : '#fd7e14',
        pointRadius         : false,
        pointColor          : '#fd7e14',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: '#fd7e14',
        data                : dataODC
    },
    {
        label               : 'Jumlah ODP',
        backgroundColor     : '#28a745',
        borderColor         : '#28a745',
        pointRadius         : false,
        pointColor          : '#28a745',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: '#28a745',
        data                : dataODP
    },
    {
        label               : 'Jumlah Pelanggan',
        backgroundColor     : '#007bff',
        borderColor         : '#007bff',
        pointRadius         : false,
        pointColor          : '#007bff',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: '#007bff',
        data                : dataPelanggan
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
  })

  {{-- var donutData        = {
    labels: [
        'Gangguan', 
        'Lancar', 
    ],
    datasets: [
      {
        data: [700,300],
        backgroundColor : ['#f56954', '#00a65a'],
      }
    ]
  }

  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
  var pieChartCanvasODC = $('#pieChartODC').get(0).getContext('2d')
  var pieChartCanvasODP = $('#pieChartODP').get(0).getContext('2d')
  var pieChartCanvasPelanggan = $('#pieChartPelanggan').get(0).getContext('2d')

  var pieData = donutData;
  var pieDataODC = donutData;
  var pieDataODP = donutData;
  var pieDataPelanggan = donutData;

  var pieOptions     = {
    maintainAspectRatio : false,
    responsive : true,
  } --}}

  {{-- //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  var pieChart = new Chart(pieChartCanvas, {
    type: 'pie',
    data: pieData,
    options: pieOptions      
  }) --}}

  {{-- //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  var pieChart = new Chart(pieChartCanvasODC, {
    type: 'pie',
    data: pieDataODC,
    options: pieOptions      
  })

  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  var pieChart = new Chart(pieChartCanvasODP, {
    type: 'pie',
    data: pieDataODP,
    options: pieOptions      
  })

  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  var pieChart = new Chart(pieChartCanvasPelanggan, {
    type: 'pie',
    data: pieDataPelanggan,
    options: pieOptions      
  }) --}}

  var currentKecamatan = {!! json_encode($currentKecamatan) !!}
  geoJson(currentKecamatan.nama);

  var pemetaanODC = {!! json_encode($pemetaanODC) !!};
  tampilDataODC(pemetaanODC);

  var pemetaanPerangkat = {!! json_encode($pemetaanPerangkat) !!};
  tampilDataODP(pemetaanPerangkat);

  var pemetaanPelanggan = {!! json_encode($pemetaanPelanggan) !!};
  tampilDataPelanggan(pemetaanPelanggan);
@endsection