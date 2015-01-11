<!DOCTYPE html>

@yield('htmltag', '<html>')

<head>
    <title>
        @section('title')
        <!-- Add Application Name in Here -->
        @show
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="/public/favicon.ico">
    {{ Assets::css(); }}
    @yield('stylesheets')

    <!--[if lt IE 9]>
    <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body style="background-attachment: fixed;">
    @if(Auth::check())
        @include('nav/navbar')
    @endif

    @if(Session::has('message_success'))
    <div class="alert alert-success alert-dismissable alert-fadeout">
        <button class="close" data-dismiss="alert">&times;</button>
        {{ Session::get('message_success') }}
    </div>
    @endif

    @if (Session::has('message_error'))
    <div class="alert alert-danger alert-dismissable alert-fadeout">
        <button class="close" data-dismiss="alert">&times;</button>
        {{ Session::get('message_error') }}
    </div>
    @endif

    @yield('content')

    {{ Assets::js(); }}
    @yield('javascripts')
</body>
</html>