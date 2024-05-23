@extends('layouts.admin')

@section('title')
    Edit Pengadaan Perangkat
@endsection

@section('slug')
    Edit Pengadaan Perangkat
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                {!! Form::model($pengadaan, ['route' => ['pengadaan.update', $pengadaan->id], 'method' => 'put', 'files' => true]) !!}
                    <div class="form-group">
                        <label for="">Pelanggan</label>
                        {!! Form::text('id_pelanggan', $pengadaan->nama, ['id' => 'id_pelanggan', 'disabled' => 'disabled', 'class' => $errors->has('pelanggan') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('pelanggan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Peta</label>
                        <div id="map"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        {!! Form::text('alamat', null, ['id' => 'alamat', 'class' => $errors->has('alamat') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Latitude</label>
                        {!! Form::text('latitude', null, ['id' => 'latitude', 'class' => $errors->has('latitude') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('latitude')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Longitude</label>
                        {!! Form::text('longitude', null, ['id' => 'longitude', 'class' => $errors->has('longitude') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('longitude')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @if (auth()->user()->role == 'sales')
                    <div class="form-group">
                        <input type="hidden" name="id_pengguna" id="pengguna" value={{ auth()->user()->id }}>
                    </div>    
                    @else
                    <div class="form-group">
                        <label for="">Nama Sales</label>
                        <select class="form-control" id="pengguna" name="id_pengguna" style="width: 100%;">
                        @foreach ($pengguna as $value)
                            <option selected="selected" value={{ $value["id"] }}>
                                {{ $value["nama"] }}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Submit</button>                         
                {!! Form::close() !!}
            </div> 
        </div>
    </div>  
@endsection

@push('script')
    <script>
        window.action = 'submit'
    </script>
@endpush

@section('script')
  {{-- var dataODP = {!! json_encode($perangkat) !!};
  tampilDataODP(dataODP); --}}
@endsection