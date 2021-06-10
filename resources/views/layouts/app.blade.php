<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="token" content="{{ csrf_token() }}"> 

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>App Cliente</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        
    @include('layouts._includes._nav')

        @if (Session::has('status'))
            <br>
            <div class="col-md-12 col-md-offset-1">
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            </div>
        @endif
        @if (Session::has('custom-error'))
            <br>
            <div class="col-md-12 col-md-offset-1">
                <div class="alert alert-danger" role="alert">
                    {{ session('custom-error') }}
                </div>
            </div>
        @endif


    </div>
    
    <main class="py-4">
        @yield('content')
    </main>


    {{-- <script src="{{ asset('../bower_components/Ajax/src/Ajax.js') }}" ></script> --}}
    <script>
        APP_URL = '{{url('/')}}' ;
    </script>


</body>
</html>
