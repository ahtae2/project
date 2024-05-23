@if (auth()->user()->role == 'admin')
<a a href="#" target="_blank" data-toggle="modal" data-target="#exportPDF">
    <button type="button" class="btn bg-gradient-success btn-sm">
      <i class="fas fa-file-pdf nav-icon"></i>
          Cetak</button>
</a>
@endif
{{-- @if (auth()->user()->role == 'admin')
<a href="#" target="_blank" data-toggle="modal" data-target="#exportExcel">
    <button type="button" class="btn bg-gradient-success btn-sm">
      <i class="fas fa-file-excel nav-icon"></i>
          Cetak Excel</button>
</a>
@endif --}}