@extends('layouts.master')

@section('title')
    @parent
    Checklists
@stop

@section('stylesheets')

@stop


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ URL::route('checklists.create') }}" class="btn btn-primary pull-right">+New Checklist</a>
            </div>
        </div>
        <table id="datatable" class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th>Job Number</th>
                <th>User</th>
                <th>Client</th>
                <th>Address</th>
            </tr>
            </thead>
            <tbody>
            @foreach($checklists as $checklist)
                <tr>
                    <td>{{$checklist->job_number or ''}}</td>
                    <td>{{$checklist->user->name or ''}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('javascripts')
    <script>
        $(document).ready(function() {
            $('#datatable').dataTable({responsive: true, paging: false});
        });
    </script>
@stop