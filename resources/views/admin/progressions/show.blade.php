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


    <div class="col-lg-6">
        <div class="row card text-white ">
            <div class="card-header bg-dark card-text">
                {{ $progression->lib_progres}}
            </div>
            <div class="card-body">
                <h4 class="card-title">{{ $progression->datdeb_progres }}</h4>

                <p>
                    @if($progression->datdeb_progres)
                        <img src="{{asset('storage/images/'.$progression->datdeb_progres) }}" width="450" height="320">
                    @endif
                </p>
                <div class="card-footer bg-info text-white ">
                    {{ $progression->datdeb_progres }}
                    <p class="card-text">Description Du Model</p>
                </div>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="row card text-white ">
                <div class="card-header bg-dark card-text">
                    {{ $progression->lib_progres}}
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $progression->datdeb_progres }}</h4>

                    <p>
                        @if($progression->datdeb_progres)
                            <img src="{{asset('storage/images/'.$progression->datdeb_progres) }}" width="450" height="320">
                        @endif
                    </p>
                    <div class="card-footer bg-info text-white ">
                        {{ $progression->datdeb_progres }}
                        <p class="card-text">Description Du Model</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop