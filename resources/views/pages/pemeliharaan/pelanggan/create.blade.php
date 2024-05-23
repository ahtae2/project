@extends('layouts.admin')

@section('title')
    Tambah Pemeliharaan
@endsection

@section('slug')
    Tambah Pemeliharaan
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => 'pemeliharaan-pelanggan.store', 'method' => 'post', 'files' => true]) !!}
                    <div class="form-group">
                        <label for="">Pelanggan</label>
                        <select class="form-control" id="id_petapelanggan" name="id_petapelanggan" style="width: 100%;">
                        @foreach ($pemetaanPelanggan as $value)
                            <option selected="selected" value={{ $value["id"] }}>
                                {{ $value["nama"] }}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        {!! Form::select('keterangan', ['Lancar' => 'Lancar', 'Gangguan' => "Gangguan"], 'Lancar', ['class' => $errors->has('keterangan') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input id="created_at" type="date" class="form-control @error('created_at') is-invalid @enderror btn-bordered" name="created_at" value="{{ old('created_at') }}" required autocomplete="created_at" autofocus placeholder="Tanggal" onfocus="(this.type='date')" onblur="(this.type='text')">

                        @error('tanggal_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Catatan (Optional)</label>
                        {!! Form::textarea('catatan', null, ['id' => 'catatan', 'class' => $errors->has('catatan') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('catatan')
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

@endsection