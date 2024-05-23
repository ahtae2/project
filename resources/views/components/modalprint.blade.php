<!-- Modal -->
<div class="modal fade" id="exportPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cetak</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <form action="@yield('route')" method="PUT" target="_blank">
            <div class="form-group">  
              <label for="tgl_awal">Tanggal Awal</label><br>
              <input type="date" name="tgl_awal" id="tgl_awal" required>
            </div>
            <div class="form-group">
              <label for="tgl_akhir">Tanggal Akhir</label><br>
              <input type="date" name="tgl_akhir" id="tgl_akhir" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Cetak</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal -->
  {{-- <div class="modal fade" id="exportExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Export Excel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <form action="{{ route('pengguna.exportexcel') }}" method="PUT">
            <div class="form-group">
              <label for="tgl_awal">Tanggal Awal</label><br>
              <input type="date" name="tgl_awal" id="tgl_awal" required>
            </div>
            <div class="form-group">
              <label for="tgl_akhir">Tanggal Akhir</label><br>
              <input type="date" name="tgl_akhir" id="tgl_akhir" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Export Excel</button>
          </form>
        </div>
      </div>
    </div>
  </div> --}}