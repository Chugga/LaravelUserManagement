@extends('layouts.main')

@section('title')
    @parent
    Users
@stop

@section('stylesheets')

@stop

@section('content')
    <div class="content">
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
                    <td><a href="{{ URL::route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop


@section('javascripts')

@stop