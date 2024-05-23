@extends('layouts.admin')

@section('title')
    Tambah ODC
@endsection

@section('slug')
    Tambah ODC
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => 'perangkat-odc.store', 'method' => 'post']) !!}
                    <div class="form-group">
                        <label for="">Nama</label>
                        {!! Form::text('nama', null, ['class' => $errors->has('nama') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Model / Merek</label>
                        {!! Form::text('model', null, ['id' => 'model', 'class' => $errors->has('model') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('model')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Core</label>
                        {!! Form::number('core', '24', ['class' => $errors->has('core') ? 'form-control is-invalid' : 'form-control']) !!}
                        @error('core')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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