@extends('layouts.master')

@section('title')
    @parent
    Select Emails
@stop

@section('stylesheets')

@stop

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <h1>Select Email Addresses to receive Checklist</h1>
                {{ Form::open(array('route' => array('checklists.mail', $checklist->id), 'method' => 'post')) }}
                @foreach($checklist->client->client_email_addresses as $email)
                    <div class="form-group">
                        {{ Form::label('email', $email->email) }}
                        {{ Form::checkbox('emails[]', $email->email, false, array('id' => 'email', 'class' => 'form-control')) }}
                    </div>
                @endforeach
                {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
            </div>
        </div>
    </div>
@stop


@section('javascripts')

@stop


