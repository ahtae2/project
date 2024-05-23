@extends('layouts.admin')

@section('title')
    Setting
@endsection

@section('slug')
  Setting
@endsection

@section('content')
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mt-2 font-weight-bold">Info Server</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example2" class="table table-striped">
          <thead class="bg-gradient-blue">
          <tr>
            <th>PHP Version</th>
            <th>Laravel Version</th>
          </tr>
          </thead>
          <tbody>
              <tr>
                <td>{{ phpversion() }}</td>
                <td>{{ App::VERSION() }}</td>
              </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
@endsection