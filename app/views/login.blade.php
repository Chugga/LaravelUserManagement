@extends('layouts.master')

@section('title')
    Login
@stop

@section('styles')

@stop


@section('content')
    <div class="gray-bg">
        <div class="middle-box text-center loginscreen  animated fadeInDown" style="padding-top: 200px;">
            <div>
                <div>
                    <!--h1 class="logo-name">Fleetmatics QK Portal</h1>-->
                </div>
                <h2 style="color: white;">Welcome to <strong>Fleetr</strong></h2>
                <p></p>
                <form class="m-t" role="form" action="/login" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" required="" name="username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" required="" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                    <a href="{{ URL::route('password.remind') }}"><small>Forgot password?</small></a>
                    <!--<p class="text-muted text-center"><small>Do not have an account?</small></p>
                    <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>-->
                </form>
                <!--<p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>-->
            </div>
        </div>
    </div>

@stop