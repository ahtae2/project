<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="{{ url('/manifest.json') }}">
    <meta name="theme-color" content="#fff" />

    <title>Radmila - Fiber Map</title>

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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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
            height: 100%;
        }

        @media only screen and (max-width: 600px) {
            #map {
                height: 90%;
            }
        }

        .links a:hover,
        .links a:focus {
            color: blue;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3" style="box-shadow:0 0 32px -4px rgba(0,0,0,.30);">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('/images/logo-circle.png') }}" width="30" height="30"
                class="d-inline-block align-top" alt="">
            <div class="d-inline font-weight-bold">
                Radmila
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="{{ url('/') }}">Home </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link font-weight-bold" href="{{ url('#') }}">Fiber Map <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="{{ url('/login') }}">Login </a>
                </li>
            </ul>
        </div>
    </nav>

    <section>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div id="map"></div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="py-5 background-gradient-blue">
        <div class="container">
            <div class="row text-white-alpha">
                <div class="col-md-6">
                    {{-- <h5>Resources</h5><br> --}}
                    <img src="{{ asset('/images/logo-circle.png') }}" width="30" height="30"
                        class="d-inline-block align-top" alt="">
                    <div class="d-inline font-weight-bold">
                        PT Radmila
                    </div><br><br>
                    <ul class="list-unstyled text-small font-weight-bold" style="font-size: small;">
                        <li><b>PT Radmila Pratama Multireka adalah perusahaan yang bergerak dibidang teknologi
                                informasi, yang berfokus pada pelanggan perusahaan telekomunikasi dan seluler di
                                Indonesia.</li><br>
                        <hr>
                        <li>&copy; 2020 Dikalangoding. All Rights Reserved.</b></li>
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
                                <li><a href="#"></a><i class="fa fa-facebook-square" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/leaflet-simple-map-screenshoter"></script>
    {{-- <script src="{{ asset('/js/leaflet-search.js') }}"></script> --}}
    <script src="https://unpkg.com/leaflet-ui@latest/dist/leaflet-ui.js"></script>
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
