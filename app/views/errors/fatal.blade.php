@extends('layouts.error')

@section('content')
    <div class="middle-box text-center animated fadeInDown">
        <h1>Fatal</h1>
        <h2>server srror</h2>
        <h3 class="font-bold">Something went wrong</h3>

        <div class="error-desc">
            <p>The server encountered something unexpected that didn't allow it to complete the request.</p>
            <p>Our staff have been notified of this error, we will do everything in our power to try and prevent this from happening again</p>
            <p>We deeply apologize.</p><br/>
            Luckily can go back to the main page: <br/><a href="/" class="btn btn-primary m-t">Home Page</a>
        </div>
    </div>

@stop