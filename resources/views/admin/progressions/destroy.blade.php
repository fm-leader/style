@extends('adminlte::page')

@section('title', 'Admin AP Model Home')

@section('content_header')
    <h1>Models Art Principaute Couture  <br>

    </h1>

@stop

@section('content')
    <p> <b> {{$email=App\User::find(\Illuminate\Support\Facades\Auth::id())->email }}</b>, TU ES CONNECTE! <b>{{ $auth->user()->name}}</b></p>
@stop