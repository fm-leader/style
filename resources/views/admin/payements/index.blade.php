@extends('adminlte::page')

@section('title', 'Admin AP Model Home')

@section('content_header')

    <p> <b>{{ $auth->user()->name}}</b>, TU ES CONNECTE! <b></b></p>  <strong>{{ date("l, d-m-Y") }}</strong> <br>

@stop



@section('content')
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


    <div class="row col-lg- col- ">

        @if(session()->has('info'))

            <div class="col-lg col alert alert-success" role="alert">
                {{ session('info') }}
            </div>

        @endif

    </div>
    <div class="contain">

        <div class="row col-lg- col-">
            <div class="col-lg col">


                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark" >
                    <tr style="text-align:center">


                        <th>Commande</th>
                        <th>Date Payement</th>
                        <th>Montant</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($payements as $payement)
                        <tr >
                            <td>
                                {{$payement->commande->lib_cmd}}
                            </td>
                            <td>
                                {{$payement->mnt_paie}}
                            </td>

                            <td>
                                {{$payement->dat_paie}}
                            </td>

                            <td>
                                {!! Form::Model($payements,['method'=>'post', 'url'=>route('payements.destroy',$payement->id)]) !!}
                                @method('DELETE')
                                <button class="btn btn-danger btn-circle btn-lg"><span class="fa fa-trash"></span></button>
                                {!! Form::close() !!}
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row d-flex justify-content-center"> {{$payements->links()}}</div>

    </div>


@stop