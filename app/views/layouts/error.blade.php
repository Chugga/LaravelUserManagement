<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="QK Services">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>
        Error
    </title>

    <!-- Bootstrap core CSS -->
    {{HTML::style('assets/css/bootstrap.min.css')}}
    {{HTML::style('assets/css/font-awesome.min.css')}}
    {{HTML::style('assets/css/style.css')}}
    {{HTML::style('assets/css/plugins/jasny/jasny-bootstrap.min.css')}}

    {{-- Always load CSS classes inside the head --}}
    {{ Assets::css() }}
    @yield('styles')

</head>

<body class="gray-bg">

@yield('content')

</body>
</html>