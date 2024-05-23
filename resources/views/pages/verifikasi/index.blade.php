@extends('layouts.admin') 

@section('title') 
  Data Pendaftar 
@endsection 

@section('slug') 
  Pendaftar 
@endsection 

@section('content')
  <div class="col-12">
      <div class="card">
          <div class="card-header">
              <h3 class="card-title mt-2 font-weight-bold">Tabel Data Pendaftar</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
              <table id="table-verifikasi" class="table table-striped">
                  <thead class="bg-gradient-blue">
                      <tr>
                          <th>No</th>
                          <th>Foto</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Alamat</th>
                          <th>Kontak</th>
                          <th>Role</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($pengguna as $index=>$value)
                      <tr>
                          <td>{{ ++$index }}</td>
                          <td><img width="50px" src="{{ url('/data_file/' . $value->foto) }}" class="img-circle"></td>
                          <td>{{ $value->nama }}</td>
                          <td>{{ $value->email }}</td>
                          <td>{{ $value->alamat }}</td>
                          <td>{{ $value->kontak }}</td>
                          <td>{{ ucwords($value->role) }}</td>
                          <td>
                            {!! Form::open(['route' => ['verifikasi-pendaftaran.update', $value->id], 'method' => 'put', 'class' => 'float-left pr-1']) !!}
                            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check nav-icon"></i></button>
                            {!! Form::close() !!}
                            <form action="{{ route('verifikasi-pendaftaran.destroy', $value->id) }}" method="post">
                                @csrf @method('DELETE')
                                <a href="{{ route('verifikasi-pendaftaran.show', $value->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye nav-icon"></i>
                                </a>
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
@endsection

@section('script')

@endsection