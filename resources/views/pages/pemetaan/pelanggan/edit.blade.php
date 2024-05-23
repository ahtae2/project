@extends('layouts.admin')

@section('title')
    Tambah Pelanggan
@endsection

@section('slug')
    Tambah Pelanggan
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                {!! Form::model($pelanggan, ['route' => ['pemetaan-pelanggan.update', $pelanggan->id], 'method' => 'put', 'files' => true]) !!}
                    <div class="form-group">
                        <label for="">Pelanggan</label>
                        {!! Form::text('id_pelanggan', $pelanggan->nama, ['id' => 'id_pelanggan', 'disabled' => 'disabled', 'class' => $errors->has('pelanggan') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('pelanggan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Provinsi</label>
                        <select name="province" id="province" class="form-control" style="width: 100%;">
                            <option value="">--Pilih Provinsi--</option>
                            @foreach ($provinces as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Kota</label>
                        <select name="city" id="city" class="form-control" style="width: 100%;">
                            <option value="">--Pilih Kota--</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Kecamatan</label>
                        <select name="district" id="district" class="form-control" style="width: 100%;">
                            <option value="">--Pilih Kecamatan--</option>
                        </select>
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
                    <div class="form-group">
                        <label for="">Nama ODP</label>
                        <select class="form-control" id="petaodp" name="id_petaodp" style="width: 100%;">
                            <option value="" selected>== Pilih ODP ==</option>
                        @foreach ($pemetaanPerangkat as $value)
                            <option value={{ $value["id"] }}>
                                {{ $value["nama"] }}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Port</label>
                        {!! Form::number('port', null, ['id' => 'port', 'class' => $errors->has('port') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('port')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @if (auth()->user()->role == 'teknisi')
                    <div class="form-group">
                        <input type="hidden" name="id_pengguna" id="pengguna" value={{ auth()->user()->id }}>
                    </div>    
                    @else
                    <div class="form-group">
                        <label for="">Nama Teknisi</label>
                        <select class="form-control" id="pengguna" name="id_pengguna" style="width: 100%;">
                        @foreach ($pengguna as $value)
                            <option selected="selected" value={{ $value["id"] }}>
                                {{ $value["nama"] }}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        {!! Form::select('keterangan', ['Lancar' => 'Lancar', 'Gangguan' => "Gangguan"], 'Lancar', ['class' => $errors->has('keterangan') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="">Foto</label>
                        {!! Form::file('foto', ['class' => $errors->has('foto') ? 'form-control-file is-invalid' : 'form-control-file']) !!}
                        @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Submit</button>                         
                {!! Form::close() !!}
            </div> 
        </div>
    </div>  
@endsection

@push('script')
    <script>
        $(function () {
            $('#province').on('change', function () {
                axios.post('{{ route('wilayah.getCity') }}', {id: $(this).val()})
                    .then(function (response) {
                        $('#city').empty();

                        $.each(response.data, function (id, name) {
                            $('#city').append(new Option(name, id))
                        })
                    });
            });
        });
        $(function () {
            $('#city').on('change', function () {
                axios.post('{{ route('wilayah.getDistrict') }}', {id: $(this).val()})
                    .then(function (response) {
                        $('#district').empty();

                        $.each(response.data, function (id, name) {
                            $('#district').append(new Option(name, id))
                        })
                    });
            });
        });
        window.action = 'submit'
    </script>
@endpush

@section('script')
    var pemetaanODC = {!! json_encode($pemetaanODC) !!};
    tampilDataODC(pemetaanODC);

    var pemetaanPerangkat = {!! json_encode($pemetaanPerangkat) !!};
    tampilDataODP(pemetaanPerangkat);

    var pemetaanPelanggan = {!! json_encode($pemetaanPelanggan) !!};
    tampilDataPelanggan(pemetaanPelanggan);
@endsection