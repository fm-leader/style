@extends('adminlte::page')

@section('title', 'Admin AP Model Home')

@section('content_header')
    <h1>Models Art Principaute Couture  <br>

    </h1>

@stop

@section('content')
    <p> <b> {{$email=App\User::find(\Illuminate\Support\Facades\Auth::id())->name }}</b>, TU ES CONNECTE!</p>


    <div class="row">
        <div class="col-lg-3 form-group">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$nbre_client}}</h3>

                    <h2>Tous les Clients</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('clients.index') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- small box -->
        <div class="col-lg-3 form-group">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$nbre_client}}</h3>

                    <h2>Enregistrer Nouveau Client</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('clients.create') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    @include('admin.inclusion.form_client_create_edit')

@stop