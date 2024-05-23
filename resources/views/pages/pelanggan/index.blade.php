@extends('layouts.admin')

@section('title-head') 
  | Data Pelanggan 
@endsection 

@section('title')
    Data Pelanggan
@endsection

@section('slug')
  Pelanggan
@endsection

@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2 font-weight-bold">Tabel Data Pelanggan</h3>
          <div class="button-title">
            <a href="{{ url('/pelanggan/create') }}">
              <button type="button" class="btn bg-gradient-primary btn-sm">
                <i class="fas fa-plus nav-icon"></i>
              Tambah</button>
            </a>
            {{-- <a href="#" target="_blank" data-toggle="modal" data-target="#exampleModal">
              <button type="button" class="btn bg-gradient-success btn-sm">
                <i class="fas fa-upload nav-icon"></i>
                  Import Excel</button>
            </a> --}}

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
        <table id="table-pelanggan" class="table table-striped">
          <thead class="bg-gradient-blue">
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kontak</th>
            <th>Email</th>
            <th>Paket</th>
            <th>Durasi</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            @foreach($pelanggan as $index=>$value)
              <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $value->created_at->format('d-m-Y') }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->alamat }}</td>
                <td>{{ $value->kontak }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->paketLangganan->nama_paket }}</td>
                <td>{{ date("Y-m-d", strtotime("+1 month", strtotime($value->created_at))) }}
                  {{"(" . date_diff(new \DateTime(date("Y-m-d", strtotime("+1 month", strtotime($value->created_at)))), new \DateTime())->format("%m Bulan %d Hari Lagi") .")" }}</td>
                <td>                                       
                  <form action="{{ route('pelanggan.destroy', $value->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <a href="{{ route('pelanggan.show', $value->id) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-eye nav-icon"></i>
                      </a>
                      <a href="{{ route('pelanggan.edit', $value->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit nav-icon"></i></a>
                      <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"><i class="fas fa-trash nav-icon"></i></button>
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

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Data Pelanggan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        {!! Form::open(['route' => 'pelanggan.import', 'method' => 'post', 'files' => true]) !!}
          <div class="form-group">
            <label for="">File .xlsx</label>
            {!! Form::file('file', ['class' => $errors->has('file') ? 'form-control-file is-invalid' : 'form-control-file', 'required' => 'required']) !!}
            @error('file')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Import Data</button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

  <x-modalprint>
    @section('route')
      {{ route('pelanggan.exportpdf') }}
    @endsection
  </x-modalprint>
@endsection