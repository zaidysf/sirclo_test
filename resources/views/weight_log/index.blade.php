@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <hr/>
            <div class="float-left">
                <h2>Weight Log</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('weight-log.create') }}"> Add Weight Log</a>
            </div>
        </div>
        <div class="col-md-12">
            <hr/>
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                  {{ $message }}
                </div>
            @endif
            <table class="table table-striped table-hover" width="100%">
                <thead class="thead-dark">
                    <th>Date</th>
                    <th>Max</th>
                    <th>Min</th>
                    <th>Variance</th>
                    <th width="30%">Action</th>
                </thead>
                @if(count($weight_logs) > 0)
                    @foreach ($weight_logs as $log)
                    <tr>
                        <td>{{ date('j F Y', strtotime($log->log_date)) }}</td>
                        <td>{{ number_format($log->max,2)+0 }}</td>
                        <td>{{ number_format($log->min,2)+0 }}</td>
                        <td>{{ number_format($log->variance,2)+0 }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('weight-log.show',$log->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('weight-log.edit',$log->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['weight-log.destroy', $log->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                    <tfoot class="table-primary">
                        <td>AVERAGE</td>
                        <td>{{ number_format($weight_stats->max/$weight_stats->counted,2)+0 }}</td>
                        <td>{{ number_format($weight_stats->min/$weight_stats->counted,2)+0 }}</td>
                        <td>{{ number_format($weight_stats->variance/$weight_stats->counted,2)+0 }}</td>
                        <td>&nbsp;</td>
                    </tfoot>
                @else
                    <tr>
                        <td colspan="5">Data not found</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
@endsection