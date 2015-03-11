@extends('layouts.master')

@section('title')
    @parent
    Clients
@stop

@section('stylesheets')

@stop

@section('content')
    <div class="content">
        <h1>Clients</h1>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ URL::route('clients.create') }}" class="btn btn-success pull-right">New Client+</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email One</th>
                        <th>Email Two</th>
                        <th>Description</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->email_one }}</td>
                            <td>
                                @if(isset($client->client_email_addresses[0]))
                                    {{ $client->client_email_addresses[0]->email }}
                                @endif
                            </td>
                            <td>
                                @if(isset($client->client_email_addresses[1]))
                                    {{ $client->client_email_addresses[1]->email }}
                                @endif
                            </td>
                            <td><a href="{{ URL::route('clients.edit', $client->id) }}" class="btn btn-primary">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@stop


@section('javascripts')

@stop