<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="{{ url('/manifest.json') }}">
    <meta name="theme-color" content="#fff" />

    <title>PT Radmila - Fiber Map</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Load Leaflet from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>
    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@2.4.0/dist/esri-leaflet.js"
        integrity="sha512-kq0i5Xvdq0ii3v+eRLDpa++uaYPlTuFaOYrfQ0Zdjmms/laOwIvLMAxh7cj1eTqqGG47ssAcTY4hjkWydGt6Eg=="
        crossorigin=""></script>
    <!-- Load Esri Leaflet Geocoder from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.css"
        integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
        crossorigin="">
    <script src="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.js"
        integrity="sha512-8twnXcrOGP3WfMvjB0jS5pNigFuIWj4ALwWEgxhZ+mxvjF5/FBPVd5uAxqT8dd2kUmTVK9+yQJ4CmTmSg/sXAQ=="
        crossorigin=""></script>
    {{-- Leaflet Search --}}
    <link rel="stylesheet" href="{{ asset('/css/leaflet-search.css') }}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

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

        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
        }

        .links a:hover,
        .links a:focus {
            color: blue;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3" style="box-shadow:0 0 32px -4px rgba(0,0,0,.30);">
        <a class="navbar-brand ml-5" href="{{ url('/') }}">
            <img src="{{ asset('/images/logo-circle.png') }}" width="30" height="30"
                class="d-inline-block align-top" alt="">
            <div class="d-inline font-weight-bold">
                PT Radmila
            </div>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="{{ url('/') }}">Home </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link font-weight-bold" href="{{ url('#') }}">Fiber Map <span
                            class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                <div id="map" style="height: 100vh;"></div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet-simple-map-screenshoter"></script>
    <script src="{{ asset('/js/leaflet-search.js') }}"></script>
    <script src="/js/script.js"></script>
    <script>
        window.thunderforestApiKey = "{{ env('THUNDERFOREST_API_KEY') }}"
    </script>
    <script src="/js/leaflet.js"></script>
    <script>
        var pemetaanPerangkat = {!! json_encode($pemetaanPerangkat) !!};
        tampilDataODPFiber(pemetaanPerangkat);
    </script>
</body>

</html>
