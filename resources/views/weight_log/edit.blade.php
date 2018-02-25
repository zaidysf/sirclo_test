@extends('layouts.default')
@section('css-add')
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.8.1/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('js-add')
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.8.1/combined/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <hr/>
            <div class="float-left">
                <h2>Edit Weight Log</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('weight-log.index') }}">Back</a>
            </div>
        </div>
        <div class="col-lg-12">
            <hr/>
            @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::model($weight_log, ['method' => 'PATCH','route' => ['weight-log.update', $weight_log->id]]) !!}
                <div class="form-group row">
                    <label for="log_date" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control datepicker" id="log_date" name="log_date" placeholder="Click on calendar icon ->" readonly value="{{ $weight_log->log_date }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="max" class="col-sm-2 col-form-label">Max</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="max" name="max" placeholder="Max weight" value="{{ $weight_log->max }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="min" class="col-sm-2 col-form-label">Min</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="min" name="min" placeholder="Min weight" value="{{ $weight_log->min }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection