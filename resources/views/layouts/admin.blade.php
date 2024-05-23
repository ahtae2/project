<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Radmila @yield('title-head')</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.19.0/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.19.0/dist/sweetalert2.all.min.js"></script>
    {{-- Leaflet Search --}}
    <link rel="stylesheet" href="{{ asset('/css/leaflet-search.css') }}">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!-- Queries -->
    <link rel="stylesheet" href="{{ asset('/css/query.css') }}">
    @stack('style')
    <style>
        .small-box {
          border-radius: 8px; /* Sudut yang lebih halus */
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan */
          transition: transform 0.3s, box-shadow 0.3s; /* Efek transisi */
        }
      
        .small-box:hover {
          transform: translateY(-5px); /* Efek angkat saat hover */
          box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Efek bayangan saat hover */
        }
      
        .small-box .icon {
          top: 10px;
          right: 10px;
          font-size: 3rem;
          opacity: 0.8; /* Sedikit transparansi */
        }
      
        .small-box .inner h3 {
          font-size: 2.2rem; /* Ukuran font lebih besar */
        }
      
        .small-box .inner p {
          font-size: 1.2rem; /* Ukuran font lebih besar */
          margin-bottom: 0;
        }
      </style>
      
</head>

<body class="hold-transition sidebar-mini text-sm layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <x-header></x-header>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <x-sidebar></x-sidebar>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-white">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            {{-- <h1 class="m-0 text-dark">@yield('title')</h1> --}}
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            {{-- <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><i class="fas fa-tachometer-alt nav-icon"></i> <a href="/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol> --}}
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        @yield('content')
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <x-footer></x-footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/leaflet-simple-map-screenshoter"></script>
    <script src="https://unpkg.com/leaflet-ui@latest/dist/leaflet-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>
    {{-- <script src="{{ asset('/js/leaflet-search.js') }}"></script> --}}
    <script src="{{ asset('/js/script.js') }}"></script>
    @stack('script')
    <script>
        window.thunderforestApiKey = "{{ env('THUNDERFOREST_API_KEY') }}"
    </script>
    <script src="{{ asset('/js/leaflet.js') }}"></script>
    <script>
        @yield('script')
    </script>
    <!-- page script -->
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        function toastSuccess() {
            Toast.fire({
                type: 'success',
                title: 'Berhasil Menambahkan!'
            })
        }

        $('document').ready(function() {
            $('#table-pengguna').dataTable({
                "responsive": true,
                "columnDefs": [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: 1
                    },
                    {
                        responsivePriority: 3,
                        targets: 2
                    }
                ]
            });

            $('#table-perangkat').dataTable({
                "responsive": true,
                "columnDefs": [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: 1
                    },
                    {
                        responsivePriority: 3,
                        targets: 2
                    }
                ]
            });

            $('#table-detail-perangkat').dataTable({
                "responsive": true,
                "columnDefs": [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: 1
                    },
                    {
                        responsivePriority: 3,
                        targets: 2
                    }
                ]
            });

            $('#table-pelanggan').dataTable({
                "responsive": true,
                "columnDefs": [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: 1
                    },
                    {
                        responsivePriority: 3,
                        targets: 2
                    }
                ]
            });

            $('#table-pemetaan-odc').dataTable({
                "responsive": true,
                "columnDefs": [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: 1
                    },
                    {
                        responsivePriority: 3,
                        targets: 3
                    }
                ]
            });

            $('#table-pemetaan-odp').dataTable({
                "responsive": true,
                "columnDefs": [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: 1
                    },
                    {
                        responsivePriority: 3,
                        targets: 3
                    }
                ]
            });

            $('#table-pemetaan-pelanggan').dataTable({
                "responsive": true,
                "columnDefs": [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: 2
                    },
                    {
                        responsivePriority: 3,
                        targets: 3
                    }
                ]
            });

            $('#table-verifikasi').dataTable({
                "responsive": true,
                "columnDefs": [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: 1
                    },
                    {
                        responsivePriority: 3,
                        targets: 2
                    }
                ]
            });

            $('#table-jadwal-pemeliharaan').dataTable({
                "responsive": true,
                "columnDefs": [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: 1
                    },
                    {
                        responsivePriority: 3,
                        targets: 5
                    }
                ]
            });

            $('#table-jadwal-pemeliharaan-pelanggan').dataTable({
                "responsive": true,
                "columnDefs": [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: 1
                    },
                    {
                        responsivePriority: 3,
                        targets: 2
                    }
                ]
            });

            $('#table-pemeliharaan').dataTable({
                "responsive": true,
                "columnDefs": [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: 1
                    },
                    {
                        responsivePriority: 3,
                        targets: 5
                    }
                ]
            });

            $('#table-pemeliharaan-pelanggan').dataTable({
                "responsive": true,
                "columnDefs": [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: 1
                    },
                    {
                        responsivePriority: 3,
                        targets: 5
                    }
                ]
            });

            $('#table-pengadaan').dataTable({
                "responsive": true,
                "columnDefs": [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: 1
                    },
                    {
                        responsivePriority: 3,
                        targets: 3
                    }
                ]
            });

            $('#example1').dataTable({
                "responsive": true,
                "columnDefs": [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: 4
                    }
                ]
            });

            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
</body>

</html>
