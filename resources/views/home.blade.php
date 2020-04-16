@extends('adminlte::page')

@section('title', 'Admin AP')

@section('content_header')
    <h1>COMMANDES DU JOURS  <br>

        @foreach($clients as $client)
            {{ $client->id }} {{ $client->nom_client   }}  <br>
        @endforeach
    </h1>

@stop

@section('content')
    <p> <b> {{$email=App\User::find(\Illuminate\Support\Facades\Auth::id())->email }}</b>, TU ES CONNECTE! <b>{{ $auth->user()->name}}</b></p>
@stop
