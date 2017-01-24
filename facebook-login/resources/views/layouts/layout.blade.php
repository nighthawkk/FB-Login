<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Facebook integration for Laravel">
    <meta name="author" content="Aman kumar ">

    <title>Facebook Login</title>


    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">






    <!--Social networking icons-->
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('//cdn.jsdelivr.net/evil-icons/1.7.8/evil-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('//fonts.googleapis.com/icon?family=Material+Icons')}}">


    <!-- End -->





</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><div class="logo">FB
                    Login<sup></div></sup></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav ">

                <li class="active"><a href="{{url('/')}}">Home</a></li>
                <li><a href="http://amankumar.16mb.com">Contact</a></li>


            </ul>
            @if(Auth::check())
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Your Profile <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header"></li>
                            <li><a href="{{url('logout')}}"><i
                                            class="fa fa-sign-out fa-fw"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            @endif
        </div><!--/.nav-collapse -->
    </div>
</nav>
    <!-- Main component for a primary marketing message or call to action -->
    @yield('content')


 <!-- /container -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-wip/js/bootstrap.min.js"></script>

</body>
</html>
