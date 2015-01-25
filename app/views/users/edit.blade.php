@extends('layouts.master')

@section('title')
    @parent
    Edit User
@stop

@section('stylesheets')

@stop

@section('content')
    <div class="content">
        {{ Form::model($user, array('route' => 'users.update', 'method' => 'post')) }}
        <div class="form-group">
            {{ Form::label('username', 'Username') }}
            {{ Form::text('username', array('id' => 'username', 'class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', array('id' => 'password', 'class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('confirm_password', 'Password') }}
            {{ Form::password('password', array('id' => 'password', 'class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('firstName', 'First Name') }}
            {{ Form::text('first_name', array('id' => 'firstName', 'class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('lastName', 'Last Name') }}
            {{ Form::text('last_name', array('id' => 'lastName', 'class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('emailAddress', 'Email Address') }}
            {{ Form::email('email', array('id' => 'emailAddress', 'class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('privilege', 'Privilege Level') }}
            {{ Form::number('privilege', array('id' => 'privilege', 'class' => 'form-control', 'step' => 1, 'min' => 0, 'max' => 10)) }}
        </div>
        {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
    </div>
@stop


@section('javascripts')

@stop