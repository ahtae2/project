<template>
    <div class="container">
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $pelanggan }}</h3>
            <p>Pelanggan</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="/admin/pelanggan" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $pengguna }}</h3>
            <p>Pengguna</p>
          </div>
          <div class="icon">
            <i class="ion ion-gear-b"></i>
          </div>
          <a href="/admin/pengguna" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-dark">
          <div class="inner">
            <h3>{{ $odp }}</h3>
            <p>Optical Distribution Point</p>
          </div>
          <div class="icon">
            <i class="ion ion-cloud"></i>
          </div>
          <a href="/admin/odp" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
          <h3>{{ $gangguan }}</h3>

            <p>Gangguan</p>
          </div>
          <div class="icon">
            <i class="ion ion-arrow-graph-down-right"></i>
          </div>
          <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <div id="map" class="map"></div>
                </div>
            </div><!-- /.card -->
        </div>
  </div>
</template>
<script>
    export default {
        
    }
</script>