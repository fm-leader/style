@extends('adminlte::page')

@section('title', 'Admin AP Model Home')

@section('content_header')
    <H1> lArtPrincipaute Couture</H1>
    <h2> COMMANDE DU JOURS   <strong>{{ date("l, d-m-Y") }}</strong> <br></h2>

@stop

@section ('css')
    <link  rel = "stylesheet"  href="{{ asset('css/bootstrap.min.css') }}" >
@stop

@section ('js')
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.js') }}"></script>
@stop

@section('content')
    <p> <b>{{ $auth->user()->name}}</b>, TU ES CONNECTE! <b></b></p>


@stop