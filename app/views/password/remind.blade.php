@extends('layouts.master')

@section('title')
    Send Password Reminder
@stop

@section('stylesheets')

@stop


@section('content')
    <div class="gray-bg">
        <div class="middle-box text-center loginscreen  animated fadeInDown" style="padding-top: 200px;">
            <div>
                <h2 style="color: white;">Send <strong>Password Reminder</strong></h2>
                <p></p>
                <form class="m-t" role="form" action="{{ action('RemindersController@postRemind') }}" method="post">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email Address..." required="" name="email">
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Send Reminder</button>
                </form>
            </div>
        </div>
    </div>

@stop