@extends('layouts.master')

@section('title')
    @parent
    Users
@stop

@section('stylesheets')

@stop

@section('content')
    <div class="content">
        <h1>Users</h1>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ URL::route('users.create') }}" class="btn btn-success pull-right">New User+</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a href="{{ URL::route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a></td>
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