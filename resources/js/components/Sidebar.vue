<template>
    <aside class="main-sidebar elevation-4 sidebar-light-warning">
        <!-- Brand Logo -->
        <a href="https://radmila.co.id" class="brand-link" target="_blank">
        <img src="/images/logo-circle.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">PT Radmila</span>
        </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="adminlte/dist/img/avatar2.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><span class="salam" /></a>
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin" class="nav-link">
              <i class="fas fa-tachometer-alt nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/pengguna" class="nav-link">
              <i class="fas fa-user-cog nav-icon"></i>
              <p>Data Pengguna</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/odp" class="nav-link">
              <i class="fas fa-microchip nav-icon"></i>
              <p>Data ODP</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/pelanggan" class="nav-link">
              <i class="fas fa-user nav-icon"></i>
              <p>Data Pelanggan</p>
            </a>
          </li>
          <li class="nav-header"></li>
          <li class="nav-item">
            <a href="/admin/map" class="nav-link" target="_blank">
              <i class="fas fa-map nav-icon"></i>
              <p>Peta</p>
            </a>
          </li>
          <li class="nav-header"></li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt nav-icon"></i>
              <p>Logout</p>
              <form id="logout-form" action="{{ route('logout" method="POST" style="display: none;">
                @csrf
            </form>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>
<script>
export default {
    
}
</script>