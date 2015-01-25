@extends('layouts.master')

@section('title')
    @parent
    Create Client
@stop

@section('stylesheets')

@stop

@section('content')
    <div class="content">
        {{ Form::open(array('route' => 'clients.store', 'method' => 'post')) }}
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', array('id' => 'name', 'class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::text('description', array('id' => 'description', 'class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('email_one', 'Email One') }}
            {{ Form::email('email_one', array('id' => 'email_one', 'class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('email_two', 'Email Two') }}
            {{ Form::email('email_two', array('id' => 'email_two', 'class' => 'form-control')) }}
        </div>

        {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
    </div>
@stop


@section('javascripts')

@stop


