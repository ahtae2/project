@extends('layouts.admin')

@section('title-head') 
  | Data ODC 
@endsection 

@section('title')
  Data ODC
@endsection

@section('slug')
  Data ODC
@endsection

@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2 font-weight-bold">Tabel Data ODC</h3>
          <div class="button-title">
            <a href="{{ url('/perangkat-odc/create') }}"><button type="button" class="btn bg-gradient-primary btn-sm"><i class="fas fa-plus nav-icon"></i>
              Tambah</button></a>
              
              <x-buttonprint></x-buttonprint>
              
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        <table id="table-perangkat" class="table table-striped">
          <thead class="bg-gradient-blue">
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Model / Merek</th>
            <th>Core</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            @foreach($perangkat as $index=>$value)
              <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $value->created_at->format('d-m-Y') }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->model }}</td>
                <td>{{ $value->core }}</td>
                <td>                                       
                  <form action="{{ route('perangkat-odc.destroy', $value->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <a href="{{ route('perangkat-odc.show', $value->id) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-eye nav-icon"></i>
                     </a>
                      <a href="{{ route('perangkat-odc.edit', $value->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit nav-icon"></i>
                      </a>
                      <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')">
                        <i class="fas fa-trash nav-icon"></i>
                      </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->

  <x-modalprint>
    @section('route')
      {{ route('perangkat-odc.exportpdf') }}
    @endsection
  </x-modalprint>
@endsection