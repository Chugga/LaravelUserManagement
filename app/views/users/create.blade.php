@extends('layouts.master')

@section('title')
    @parent
    Create User
@stop

@section('stylesheets')

@stop

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <h1>Create User</h1>
                {{ Form::open(array('route' => 'users.store', 'method' => 'post')) }}
                <div class="form-group">
                    {{ Form::label('username', 'Username') }}
                    {{ Form::text('username', null, array('id' => 'username', 'class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password', array('id' => 'password', 'class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('confirm_password', 'Confirm Password') }}
                    {{ Form::password('password', array('id' => 'password', 'class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('firstName', 'First Name') }}
                    {{ Form::text('first_name', null, array('id' => 'firstName', 'class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('lastName', 'Last Name') }}
                    {{ Form::text('last_name', null, array('id' => 'lastName', 'class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('emailAddress', 'Email Address') }}
                    {{ Form::email('email', null, array('id' => 'emailAddress', 'class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('privilege', 'Privilege Level') }}
                    {{ Form::number('privilege', 1, array('id' => 'privilege', 'class' => 'form-control', 'step' => 1, 'min' => 0, 'max' => 10)) }}
                </div>
                {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
            </div>
        </div>
    </div>
@stop


@section('javascripts')

@stop


