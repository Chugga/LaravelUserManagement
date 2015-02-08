@extends('layouts.master')

@section('title')
    Reset Password
@stop

@section('stylesheets')

@stop


@section('content')
    <div class="gray-bg">
        <div class="middle-box text-center loginscreen  animated fadeInDown" style="padding-top: 200px;">
            <div>
                <h2 style="color: white;">Reset Your <strong>Password</strong></h2>
                <p></p>
                <form class="m-t" role="form" action="{{ action('RemindersController@postReset') }}" method="post">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email Address..." required="" name="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password..." required="" name="password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password..." required="" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Reset Password</button>
                </form>
            </div>
        </div>
    </div>

@stop