<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>The Forum</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/timeline.css') }}" rel="stylesheet" />
    <link href="{{asset('sidebar/dashboard.css')}}" rel="stylesheet">

    <!-- MAY NOT BE NEEDED -->
        <link href="{{ asset('summernote/summernote.css') }}" rel="stylesheet">
        <script src="{{ asset('summernote/summernote.js')}}"></script>
    <!-- -->

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>

</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    THE FORUM
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"> <i class="fa fa-sign-in"></i> Log in</a></li>
                        <li><a href="{{ url('/register') }}"> <i class="fa fa-key"></i> Register</a></li>
                    @else
                        <li>
                            <button class="btn btn-default btn-link" style="color: white; margin-top: 5px;">
                                <i class="fa fa-btn fa-envelope fa-2x"></i>
                            </button>
                            <span id="notification" class="badge badge-notify">
                                @if(Auth::user())
                                    {{ App\VisitorMessage::where('username_to', Auth::user()->username)->where('read', false)->get()->count() }}
                                @endif
                            </span>
                        </li>
                        <li><img src="{{asset(Auth::user()->avatar)}}" class="img-circle" style="width: 40px;
    margin-top: 5px;"/></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/users/' . Auth::user()->username) }}">
                                        <i class="fa fa-user-plus"></i> My profile page
                                    </a></li>
                                <li><a href="{{ url('/users/' . Auth::user()->username .'/control-panel/edit-details') }}">
                                        <i class="fa fa-cog"></i> User control panel
                                    </a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @if(!Auth::guest() && !Auth::user()->validated)
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-sm-offset-3">
                <div class="alert alert-info text-center">
                    Your account <b>is not yet</b> validated. Follow the instructions <b>sent to your e-mail address</b> to validate it. <br/>
                    By doing so, you will enable the full functionality and permissions.
                </div>
            </div>
        </div>
    </div>
    @endif

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        var conn = new WebSocket('ws://127.0.0.1:8080');
        var number = 1;

        conn.onopen = function(e) {
            console.log('Connection established!');
        };

        conn.onmessage = function(e){
            console.log('Получењиј данне: ' + e.data);
            $(function(){
                $('#notification').text(
                        <?php
                            if(\Auth::user()) echo \Auth::user()->number;
                            else echo 0;
                        ?> + number
                );
            });

            ++number;
        };

        function send()
        {
            var data = "Данне дља отправки: " + Math.random();
            conn.send(data);
            console.log("Отправлено: " + data);
        }
    </script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
