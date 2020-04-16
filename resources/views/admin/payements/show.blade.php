@extends('adminlte::page')

@section('title', 'Admin AP Model Home')

@section('content_header')
    <h1>Nouvelle Commande Art Principaute Couture<br></h1>
@stop


@section ('css')
    <link  rel = "stylesheet"  href="{{ asset('css/bootstrap.min.css') }}" >
@stop

@section ('js')
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.js') }}"></script>
@stop



@section('content')
    <p> <b> {{$email=App\User::find(\Illuminate\Support\Facades\Auth::id())->name }}</b>, TU ES CONNECTE!</p>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$nbre_employe}}</h3>

                    <h2>Enregistrer Nouveau employe</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('employes.index') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- small box -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>150</h3>

                    <h2>Enregistrer Nouveau employe</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('employes.create') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="">
        <div class="col-lg-6">
            <div class="row card text-white ">
                <div class="card-header bg-dark card-text">
                    {{ $modele->lib_modele}}
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $modele->lib_modele }}</h4>

                    <p>
                        @if($modele->image_modele)
                            <img src="{{asset('storage/images/'.$modele->image_modele) }}" width="450" height="320">
                        @endif
                    </p>
                    <div class="card-footer bg-info text-white ">
                        {{ $modele->prix_modele }}
                        <p class="card-text">Description Du Model</p>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
            </div>
        </div>
    </div>

@stop