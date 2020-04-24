<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aref+Ruqaa&display=swap">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

        </style>
    </head>
    <body>
      <!-- Start navbar -->
      <nav class="my-navbar">
        @if(Auth::check())
        <a>welcome:
          {{Auth::user()->name}}</a>
        <a href="/logout">logout</a>
        @else
        <a href="/login">login</a>
        <a href="/register">register</a>
        @endif

      </nav>
      <nav class="navbar">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand logo" href="/">samar dünyası</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            @if(Auth::check() && Auth::id() === 1)
            <li><a href="/statistics">statistics</a></li>
            <li><a href="/admin">control panel</a></li>
            @endif
            <li><a href="/allposts">designs</a></li>
            <li><a href="/aboutme">about me</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="wrapper">
    <!-- End navbar -->
      @yield('content')
    </div>
      <div class="pluss"></div>
<!-- Start footer -->
<footer >
  <div class="container">
    <section >
      <span class=" text-center">copyright &copy; 2020 by samar mahfouz </span>
    </section>
  </div>
</footer>
<!-- End footer -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script  src="{{URL::asset('js/mixitup.min.js')}}"></script>
<script  src="{{URL::asset('js/custom.js')}}"></script>
</html>

    </body>
</html>
