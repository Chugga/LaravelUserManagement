<!DOCTYPE html>

@yield('htmltag', '<html>')

<head>
    <title>
        @section('title')
        Kelvin Court -
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


    <div id="wrapper">
        @if(Auth::check())
            @include('nav.sidebar')
        <div id="page-wrapper" class="white-bg">
            @include('nav.navbar')
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        @section('messages')
                            @if(Session::has('message_notice') || Session::has('message_error') || Session::has('message_success'))
                                <div class="alert-container">
                                    @if(Session::has('message_notice'))
                                        <div class="alert alert-warning alert-dismissable alert-fadeout">
                                            <button class="close" data-dismiss="alert">&times;</button>
                                            {{ Session::get('message_notice') }}
                                        </div>
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
                                </div>
                            @endif
                        @show
                                <!-- Content -->
                        @yield('content')
                    </div>
                </div>
            </div><!-- /.container -->
            <div class="footer">
                <div>
                    <strong>Copyright</strong> Timothy Clark&copy; 2015<br />
                </div>
            </div>
            @else
                @yield('content')
            @endif
        </div>
    </div>
    {{-- Always load JS classes inside the bottom of the body --}}
    {{ Assets::js() }}
    @yield('javascripts')
</body>
</html>