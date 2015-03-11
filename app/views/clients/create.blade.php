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
                <h1>Create Client</h1>
                {{ Form::open(array('route' => 'clients.store', 'method' => 'post')) }}
                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', null, array('id' => 'name', 'class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('description', 'Description') }}
                    {{ Form::text('description', null, array('id' => 'description', 'class' => 'form-control')) }}
                </div>
                <div id="email-container">
                    <div class="form-group">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::email('email[]', null, array('id' => 'email', 'class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group">
                    <input id="add-email" type="button" class="btn btn-primary pull-right" value="Add Email" />
                </div>
                {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
            </div>
        </div>
    </div>
@stop


@section('javascripts')
    <script>
        var body = $("body");

        body.on('click', '#add-email', function() {
            $('#email-container').append('<div class="form-group"><label for="email">Email</label><input type="email" name="email[]" id="email" class="form-control" /></div>');
        });

        body.on('change', '.photo-upload',function() {
            $(this).parent().parent().append($(this).parent().clone());
        });
    </script>
@stop


