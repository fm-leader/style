@extends('adminlte::page')

@section('title', 'Admin AP Model Home')

@section('content_header')

@stop


@section ('js')

    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/select2.full.min.js') }}"></script>


    <script type="text/javascript">


        // Fonction our serialise les date debut et fin utilse sous forme de chaine de caracteres
        function showValues() {
            $( "#dat_df_cmd" ).val("");
            var str = $("input[id^='date_cmd'][value!='']").serialize();
            $( "#dat_df_cmd" ).val( str );
            alert(str);
        }

        $(document).ready(function(){
            $("#btn_affi_com_cmd").on( "click", showValues );
        })
    </script>
@stop

@section('content')


    <div class="row">
        <div class="col-lg-3 form-group">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{856}}</h3>

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
                    <h3>{{485}}</h3>

                    <h2>Enregistrer Nouveau Client</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('clients.create') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-3 form-group">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{452}}</h3>

                    <h2>Enregistrer Nouveau Client</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('clients.create') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 form-group">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{112}}</h3>

                    <h2>Enregistrer Nouveau Client</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('clients.create') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
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





    <div class="row">


        <div class="col-lg-6 form-group">
            <!-- small box -->
            <h2> Commandes</h2>


            <div class="row">
                <div class="col-lg-4 form-group">
                    {!! Form::open(['method'=>'get','id'=>'form_cmd']) !!}


                    {!! Form::label('title','Date de debut') !!}
                    {!! Form::date('date_cmd_deb',null,['class'=>'form-control','style'=>'width: 100%;','id'=>'date_cmd_deb'] )!!}
                </div>
                <div class="col-lg-4 form-group">
                    {!! Form::label('title','Date de fin') !!}
                    {!! Form::date('date_cmd_fin',null,['class'=>'form-control','style'=>'width: 100%;','id'=>'date_cmd_fin'] )!!}
                </div>
                <div class="col-lg-4 form-group">
                    <br>
                    {!! Form::hidden('dat_df_cmd',null,['class'=>'form-control','id'=>'dat_df_cmd'] )!!}
                    <button class="btn btn-primary  btn-lg"><span class="fa fa-search"> Rechercher</span></button>
                    {!! Form::close() !!}
                </div>
            </div>

            <div class="row">
                <div class="col-lg form-group">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark" >
                        <tr style="text-align:center">
                            <th></th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr style="text-align:center">
                            <td>

                                <h4> Montant Total de toutes les Commandes </h4>

                            </td>

                            <td>

                                <h4><strong>{{$comptas}} F CFA</strong></h4>

                            </td>


                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="col-lg-1 form-group">

        </div>






        <div class="col-lg-5 form-group">
            <!-- small box -->
            <h2>Employe</h2>


            <div class="row">
                <div class="col-lg-4 form-group">
                    {!! Form::open(['method'=>'post']) !!}

                    {!! Form::label('title','Date de debut') !!}
                    {!! Form::date('dat_deb_employe',null,['class'=>'form-control','style'=>'width: 100%;'] )!!}
                </div>
                <div class="col-lg-4 form-group">
                    {!! Form::label('title','Date de fin') !!}
                    {!! Form::date('dat_fin_employe',null,['class'=>'form-control','style'=>'width: 100%;'] )!!}
                </div>
                <div class="col-lg-4 form-group">
                    <br>
                    {!! Form::hidden('dat_df_emp',null,['class'=>'form-control','id'=>'dat_df_emp'] )!!}
                    <button class="btn btn-primary  btn-lg"><span class="fa fa-search"> Rechercher</span></button>
                    {!! Form::close() !!}
                </div>

            </div>



            <div class="row">
                <div class="col-lg form-group">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark" >
                        <tr style="text-align:center">
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr style="text-align:center">
                            <td>

                                <h4> Montant Total de toutes les Commandes </h4>


                            </td>

                            <td>

                                <h4><strong>{{$comptas}} F CFA</strong></h4>


                            </td>



                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>






    </div>







@stop