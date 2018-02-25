@extends('layouts.default')
 
@section('content')
    <div class="row">
        <div class="col-md-12">
            <hr/>
            <div class="float-left">
                <h2>Show Weight Log</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('weight-log.index') }}">Back</a>
            </div>
        </div>
        <div class="col-md-12">
            <hr/>
            <table class="table table-bordered" width="100%">
                <tr>
                    <td width="15%">Date</td>
                    <td>{{ $weight_log->log_date }}</td>
                </tr>
                <tr>
                    <td>Max</td>
                    <td>{{ $weight_log->max }}</td>
                </tr>
                <tr>
                    <td>Min</td>
                    <td>{{ $weight_log->min }}</td>
                </tr>
                <tr>
                    <td>Variance</td>
                    <td>{{ $weight_log->variance }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection