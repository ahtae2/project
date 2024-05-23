<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      {{-- <li class="nav-item">
        <h5 class="mt-1 font-weight-bold text-white">{{ ucwords(Auth::user()->role) }}</h5>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{ $notif = (($gangguanODP = App\PemetaanPerangkat::where('keterangan', 'Gangguan')->count()) + ($gangguanPelanggan = App\PemetaanPelanggan::where('keterangan', 'Gangguan')->count()) + ($verif = App\Pengguna::where('Verifikasi', 0)->count()) + ($newODP = count(array_diff(App\Perangkat::pluck('id')->toArray(), App\PemetaanPerangkat::pluck('id_odp')->toArray()))) ) }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">{{ $notif }} Notifications</span>
          @if (auth()->user()->role == 'admin' || auth()->user()->role == 'teknisi')
          <div class="dropdown-divider"></div>
          <a href="{{ url('/pemetaan-odp') }}" class="dropdown-item">
            <i class="fas fa-file mr-2"></i>{{ $gangguanODP }} Gangguan ODP
            <span class="float-right text-muted text-sm"></span>
          </a>
          @endif
          @if (auth()->user()->role == 'admin' || auth()->user()->role == 'teknisi')
          <div class="dropdown-divider"></div>
          <a href="{{ url('/pemetaan-pelanggan') }}" class="dropdown-item">
            <i class="fas fa-user mr-2"></i>{{ $gangguanPelanggan }} Gangguan Pelanggan
            <span class="float-right text-muted text-sm"></span>
          </a>
          @endif
          @if (auth()->user()->role == 'admin' || auth()->user()->role == 'teknisi')
          <div class="dropdown-divider"></div>
          <a href="{{ url('/pemetaan-odp') }}" class="dropdown-item">
            <i class="fas fa-microchip mr-2"></i>{{ $newODP }} ODP Baru
            <span class="float-right text-muted text-sm"></span>
          </a>
          @endif
          @if (auth()->user()->role == 'admin')
          <div class="dropdown-divider"></div>
          <a href="{{ url('/verifikasi-pendaftaran') }}" class="dropdown-item">
            <i class="fas fa-check mr-2"></i>{{ $verif }} Verifikasi
            <span class="float-right text-muted text-sm"></span>
          </a>
          @endif
          <div class="dropdown-divider"></div>
          @if ($notif == 0)
            <a href="#" class="dropdown-item">
                No Notifications
              <span class="float-right text-muted text-sm"></span>
            </a>
          @endif
        </div>
      </li>
    </ul>
  </nav>