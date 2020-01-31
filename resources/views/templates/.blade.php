<html>
    <head class="head-pg">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">


     <!--  <img src="{{url('/img/header-logo.jpg')}}"> -->
        <div class="container">
            <a href="{{url('inicial')}}">
            <img src="{{ asset('img/header-logo.jpg')}} alt="logo">
            </a>
        </div>

        <title>{{$title or 'Pagina Indefinida'}}</title>
    </head>
    <body>

    <link rel="stylesheet" href="{{url('/css/style.css')}} ?v=<?=time();?>">

    <div class="container">
        blabal
        @yield('content')
    </div>
        @stack('scripts')
    </body>
</html>