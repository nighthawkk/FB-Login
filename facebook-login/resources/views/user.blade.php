
@extends('layouts/layout')

@section('content')
    <br>
    <br>
    <div class = "container">


    @if(Session::has('message'))
        <div class="alert alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <div class="alert alert-info">
                {{ \Session::get('message')}}
            </div>

        </div>
    @endif

    @if (!empty($data))
       <div class="jumbotron vertical-center">
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="{{ $data['photo']}}" alt="Profile image">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{{ $data['name'] }}} </h4>
                Your email is {{ $data['email']}}
                <br>
                Gender : {{ $data['gender']}}
            </div>
        </div>
        <hr>
        <a href="{{url('logout')}}" class="btn btn-primary btn-lg">Logout</a>
       </div>
    @else
        <div class="jumbotron">
            <font face="Comic Sans MS" ><h1>Facebook login</h1></font>
            <font face="monospace" ><p>Created by <a href="http://facebook.com/amandapunk" target="_blank">Aman</a></p></font>
            <p class="text-center">
                <a class="btn btn-lg btn-primary" href="{{url('login/fb')}}"><i class="icon-facebook"></i> Login with Facebook</a>
            </p>
        </div>
    @endif
</div>

@stop
