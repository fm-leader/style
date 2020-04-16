@extends('adminlte::page')

@section('title', 'Admin AP Model Home')

@section('content_header')
    <h1>Models Art Principaute Couture  <br>

    </h1>

@stop

@section('content')
    <p> <b> {{$email=App\User::find(\Illuminate\Support\Facades\Auth::id())->email }}</b>, TU ES CONNECTE! </p>

    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{200}}</h3>

                    <h2> Les Payements </h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('payements.index') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- small box -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{200}}</h3>

                    <h2>Enregistrer Payements </h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('payements.create') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>


    @include('admin.inclusion.form_payement_create_edit')
@stop