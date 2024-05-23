<aside class="main-sidebar elevation-1 sidebar-light-primary">
  <!-- Brand Logo -->
  <a href="https://radmila.co.id" class="brand-link" target="_blank">
    <img src="{{ asset('/images/rad.png')}}" alt="logo" class="brand-image img-circle" style="opacity: .8">
    <span class="brand-text font-weight-bold">Radmila</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image pt-2">
        <a href="{{ url('/profile') }}">
          <img src="{{ url('/data_file/' . Auth::user()->foto) }}" class="img-circle elevation-2" alt="User Image">
        </a>
      </div>
      <div class="info">
        <p class="salam d-inline"></p>
        <a href="{{ url('/profile') }}" class="d-block font-weight-bold">{{ ucwords(Auth::user()->nama) }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::path() == 'dashboard' ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt nav-icon"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/map2') }}" class="nav-link">
            <i class="fas fa-map nav-icon"></i>
            <p>Peta</p>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a href="{{ url('/map') }}" class="nav-link" target="_blank">
            <i class="fas fa-map nav-icon"></i>
            <p>Peta Full</p>
          </a>
        </li> --}}
        @if (auth()->user()->role == 'admin')
        <li class="nav-item">
          <a href="{{ url('/verifikasi-pendaftaran') }}" class="nav-link {{ (request()->routeIs('verifikasi-pendaftaran.index')) ? 'active' : '' }}">
            <i class="fas fa-check nav-icon"></i>
            <p>Verifikasi Pendaftaran</p>
          </a>
        </li>
        @endif
        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'sales')
          <li class="nav-header">DATA MASTER</li>
          @if (auth()->user()->role == 'admin')
            <li class="nav-item">
              <a href="{{ url('/pengguna') }}" class="nav-link {{ (request()->routeIs('pengguna.index')) ? 'active' : '' }}">
                <i class="fas fa-user nav-icon"></i>
                <p>Data Pengguna</p>
              </a>
            </li>
          @endif
          @if (auth()->user()->role == 'admin')
            <li class="nav-item">
              <a href="{{ url('/perangkat-odc') }}" class="nav-link {{ (request()->routeIs('perangkat-odc.index')) ? 'active' : '' }}">
                <i class="fas fa-server nav-icon"></i>
                <p>Data ODC</p>
              </a>
            </li>
          @endif
          @if (auth()->user()->role == 'admin')
            <li class="nav-item">
              <a href="{{ url('/perangkat-odp') }}" class="nav-link {{ (request()->routeIs('perangkat-odp.index')) ? 'active' : '' }}">
                <i class="fas fa-microchip nav-icon"></i>
                <p>Data ODP</p>
              </a>
            </li>
          @endif
          <li class="nav-item">
            <a href="{{ url('/pelanggan') }}" class="nav-link {{ (request()->routeIs('pelanggan.index')) ? 'active' : '' }}">
              <i class="fas fa-users fa-2x nav-icon"></i>
              <p>Data Pelanggan</p>
            </a>
          </li>
          @if (auth()->user()->role == 'admin')
            <li class="nav-item">
              <a href="{{ url('/pelanggan/verifikasi') }}" class="nav-link {{ (request()->routeIs('pelanggan.verifikasi.index')) ? 'active' : '' }}">
                <i class="fas fa-user nav-icon"></i>
                <p>Verifikasi Pelanggan</p>
              </a>
            </li>
          @endif
        @endif
        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'teknisi')
          <li class="nav-header">PEMETAAN</li>
          <li class="nav-item">
            <a href="{{ url('/pemetaan-odc') }}" class="nav-link {{ (request()->routeIs('pemetaan-odc.index')) ? 'active' : '' }}">
              <i class="fas fa-server nav-icon"></i>
              <p>ODC</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/pemetaan-odp') }}" class="nav-link {{ (request()->routeIs('pemetaan-odp.index')) ? 'active' : '' }}">
              <i class="fas fa-microchip nav-icon"></i>
              <p>ODP</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/pemetaan-pelanggan') }}" class="nav-link {{ (request()->routeIs('pemetaan-pelanggan.index')) ? 'active' : '' }}">
              <i class="fas fa-user nav-icon"></i>
              <p>Pelanggan</p>
            </a>
          </li>
        @endif
        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'teknisi')
          <li class="nav-header">PEMELIHARAAN</li>
          <li class="nav-item">
            <a href="{{ url('/pemeliharaan') }}" class="nav-link {{ (request()->routeIs('pemeliharaan.index')) ? 'active' : '' }}">
              <i class="fas fa-microchip nav-icon"></i>
              <p>ODP</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/pemeliharaan-pelanggan') }}" class="nav-link {{ (request()->routeIs('pemeliharaan-pelanggan.index')) ? 'active' : '' }}">
              <i class="fas fa-user nav-icon"></i>
              <p>Pelanggan</p>
            </a>
          </li>
        @endif
        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'sales')
        <li class="nav-header">PENGADAAN</li>
        <li class="nav-item">
          <a href="{{ url('/pengadaan') }}" class="nav-link {{ (request()->routeIs('pengadaan.index')) ? 'active' : '' }}">
            <i class="fas fa-user nav-icon"></i>
            <p>Perangkat Pelanggan</p>
          </a>
        </li>
        @endif
        {{-- @if (auth()->user()->role == 'admin')
          <li class="nav-header">WILAYAH</li>
          <li class="nav-item">
            <a href="#" class="nav-link {{ (request()->routeIs('provinsi.index')) ? 'active' : '' }}">
              <i class="fas fa-globe nav-icon"></i>
              <p>Provinsi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link {{ (request()->routeIs('kota-kabupaten.index')) ? 'active' : '' }}">
              <i class="fas fa-globe nav-icon"></i>
              <p>Kota / Kabupaten</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/kecamatan') }}" class="nav-link {{ (request()->routeIs('kecamatan.index')) ? 'active' : '' }}">
              <i class="fas fa-globe nav-icon"></i>
              <p>Kecamatan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link {{ (request()->routeIs('kelurahan-desa.index')) ? 'active' : '' }}">
              <i class="fas fa-globe nav-icon"></i>
              <p>Kelurahan / Desa</p>
            </a>
          </li>
        @endif --}}
        @if (auth()->user()->role == 'admin')
          <li class="nav-header">SETTING</li>
          <li class="nav-item">
            <a href="{{ url('/setting') }}" class="nav-link">
              <i class="fas fa-server nav-icon"></i>
              <p>Info Server</p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-history nav-icon"></i>
              <p>History Login</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-database nav-icon"></i>
              <p>Backup Database</p>
            </a>
          </li> --}}
        @endif
        <li class="nav-header"></li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <p>Logout</p>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          </a>
        </li>
        <li class="nav-header"></li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>