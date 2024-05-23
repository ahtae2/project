<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peta</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://localhost:8000/adminlte/dist/css/adminlte.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    {{-- Leaflet --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />
    {{-- Leaflet Search --}}
    <link rel="stylesheet" href="{{ asset('/css/leaflet-search.css') }}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <style>
        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
        }
    </style>
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body>
    <div id="map" style="height: 100vh;"></div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-simple-map-screenshoter"></script>
    {{-- <script src="{{ asset('/js/leaflet-search.js') }}"></script> --}}
    <!-- Leaflet-UI -->
    <script src="https://unpkg.com/leaflet-ui@latest/dist/leaflet-ui.js"></script>
    <script src="/js/script.js"></script>
    <script>
        window.thunderforestApiKey = "{{ env('THUNDERFOREST_API_KEY') }}"
    </script>
    <script src="/js/leaflet.js"></script>
    <script>
        var pemetaanODC = {!! json_encode($pemetaanODC) !!};
        tampilDataODC(pemetaanODC);

        var pemetaanPerangkat = {!! json_encode($pemetaanPerangkat) !!};
        tampilDataODP(pemetaanPerangkat);

        var pemetaanPelanggan = {!! json_encode($pemetaanPelanggan) !!};
        tampilDataPelanggan(pemetaanPelanggan);
    </script>
</body>

</html>
