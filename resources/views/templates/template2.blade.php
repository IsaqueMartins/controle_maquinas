<html>
    <head class="head-pg">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

        <script type="application/javascript">
            var baseUrl    = <?php echo "'".URL::to("/")."/';"; ?>
        </script>

        <title>{{$title or 'Pagina Indefinida'}}</title>
        <div class="container">
            <a href="{{url('inicial')}}">
            <img src="{{ asset('img/header-logo.jpg')}}" class="img-pg">
            </a>
        </div>

    </head>
    <body>
        <link rel="stylesheet" href="{{asset('css/style.css')}}"  <?=time();?>">

        <div class="container">
        @yield('content')

        </div>

        @stack('scripts')

    </body>
</html>