@extends('layouts.admin')

@section('title')
    Edit ODP
@endsection

@section('slug')
    Edit ODP
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                {!! Form::model($perangkat, ['route' => ['perangkat-odp.update', $perangkat->id], 'method' => 'put']) !!}
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
                    {!! Form::text('model', null, ['class' => $errors->has('model') ? 'form-control is-invalid' : 'form-control']) !!}
                    @error('model')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Core</label>
                    {!! Form::number('core', null, ['class' => $errors->has('core') ? 'form-control is-invalid' : 'form-control']) !!}
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