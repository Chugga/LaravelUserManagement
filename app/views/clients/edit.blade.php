@extends('layouts.master')

@section('title')
    @parent
    Create Client
@stop

@section('stylesheets')

@stop

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <h1>Edit Client</h1>
                {{ Form::model($client, array('route' => array('clients.update', $client->id), 'method' => 'put')) }}
                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', null, array('id' => 'name', 'class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('description', 'Description') }}
                    {{ Form::text('description', null, array('id' => 'description', 'class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email_one', 'Email One') }}
                    {{ Form::email('email_one', null, array('id' => 'email_one', 'class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email_two', 'Email Two') }}
                    {{ Form::email('email_two', null, array('id' => 'email_two', 'class' => 'form-control')) }}
                </div>

                {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
            </div>
        </div>
    </div>
@stop


@section('javascripts')

@stop


