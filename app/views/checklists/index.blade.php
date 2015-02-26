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
            <div class="col-md-6">
                <h1>Checklists</h1>
            </div>
            <div class="col-md-6">
                <a href="{{ URL::route('checklists.create') }}" class="btn btn-primary pull-right">+New Checklist</a>
            </div>
        </div>
        <br />
        <br />
        <table id="datatable" class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th class="col-md-2">Job Number</th>
                <th class="col-md-2">User</th>
                <th class="col-md-2">Client</th>
                <th class="col-md-4">Address</th>
                <th class="col-md-2">Open</th>
            </tr>
            </thead>
            <tbody>
            @foreach($checklists as $checklist)
                <tr>
                    <td>{{$checklist->job_number or ''}}</td>
                    <td>{{$checklist->user->first_name . " " . $checklist->user->last_name}}</td>
                    <td>{{$checklist->client->name or ''}}</td>
                    <td>{{$checklist->address or ''}}</td>
                    <td>
                        @if(count($checklist->cl_sections) > 0 && count($checklist->cl_sections[0]->cl_subsections) > 0)
                            <a href="{{ URL::route('checklists.show', array($checklist->id)) }}" class="btn btn-success">Show</a>
                            <a href="{{ URL::route('clsubsections.edit', array($checklist->cl_sections[0]->cl_subsections[0]->id)) }}" class="btn btn-primary">Edit</a>
                        @else
                            <p>No sections or subsections in checklist.</p>
                        @endif
                    </td>
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