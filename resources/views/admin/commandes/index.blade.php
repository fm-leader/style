@extends('adminlte::page')

@section('title', 'Admin AP Model Home')

@section('content_header')
    <h2> COMMANDE DU JOURS   <strong>{{ date("l, d-m-Y") }}</strong> <br></h2>

@stop

@section ('css')
    <link  rel = "stylesheet"  href="{{ asset('css/bootstrap.min.css') }}" >
    <link  rel = "stylesheet"  href="{{ asset('css/select2.min.css') }}" >
    <link  rel = "stylesheet"  href="{{ asset('css/bootstrap-switch.min.css') }}" >
    <link  rel = "stylesheet"  href="{{ asset('css/bootstrap2-toggle.min.css') }}" >



@stop

@section ('js')
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-switch.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap2-toggle.min.js') }}"></script>



    <script type="text/javascript">
        //Initialize Select2 Elements " js/select2.full.min.js"
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        });

        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    </script>
@stop

@section('content')

    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$nbre_cmd}}</h3>

                    <h2>Toutes les Commandes</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('commandes.index') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- small box -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$nbre_cmd}}</h3>

                    <h2>Nouvelle Commande</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('commandes.create') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>



        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$nbre_cmd}}</h3>

                    <h2>Toutes les Commandes</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('commandes.index') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- small box -->
        <div class="col-lg-3 col-6 form-group">
            <!-- small box -->

            <div class="form-group">

                {!! Form::label('title','Telephone du Client') !!}
                <select  class="form-control select2" style="width: 100%;" onchange="window.location.href = this.value">
                    <option></option>
                    @foreach($clientels as $clientel)
                        <option value="{{ route('commandes.client', $clientel->contact_client) }}" {{ $contact_client == $clientel->contact_client ? 'selected' : '' }}>{{ $clientel->contact_client }}</option>
                    @endforeach
                </select>



                <!-- /.input group -->
            </div>

        </div>


        <!-- phone mask -->

    </div>

    <div class="row col-lg- col- ">

        @if(session()->has('info'))

            <div class="col-lg col alert alert-success" role="alert">
                {{ session('info') }}
            </div>

        @endif

    </div>



    <div class="row col-lg- col-">
        <div class="col-lg col">


            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark" >
                <tr style="text-align:center">
                    <th><h3>Commande</h3></th>
                    <th><h3>Client</h3></th>
                    <th><h3>RDV</h3></th>
                    <th><h3>Prix</h3></th>
                    <th><h3>Model</h3></th>
                    <th><h3>Action</h3></th>
                </tr>
                </thead>
                <tbody>

                @foreach($commandes as $commande)
                    <tr @if(App\Livraison::whereCommande_id($commande->id)->first()!= null)  class="bg-dark text-muted"  @endif>
                        <td>
                            <h3>{{$commande->lib_cmd}}</h3>
                        </td>

                        <td>
                            <h3>{{$commande->client->nom_client}}</h3>

                        </td>


                        <td>
                            <h3>{{$commande->rdv_cmd}}</h3>
                        </td>

                        <td id="td_paye1">
                            <h3>{{$commande->prix_cmd}}</h3>
                        </td>

                        <td>
                            @if($commande->modele->image_modele)
                                <img src="{{asset('storage/images/'.$commande->modele->image_modele) }}" width="100" height="80" >
                            @endif
                        </td>

                        <td>

                            <div class="row">
                                @if(App\Livraison::whereCommande_id($commande->id)->first()== null)
                                    <div class="col-2">
                                        <a class="btn btn-warning btn-circle btn-lg" href="{{ route('commandes.edit',$commande->id) }}" role="button"><span class="fa fa-edit"></span></a>
                                    </div>
                                @endif
                                <div class="col-2">
                                    <a class="btn btn-info btn-circle btn-lg" href="{{ route('commandes.show',$commande->id) }}" role="button"><span class="fa fa-eye"></span></a>
                                </div>
                                <div class="col-2">
                                    {!! Form::Model($commande,['method'=>'post', 'url'=>route('commandes.destroy',$commande->id)]) !!}
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-circle btn-lg"><span class="fa fa-trash"></span></button>
                                </div>

                                {!! Form::close() !!}
                                @if(App\Livraison::whereCommande_id($commande->id)->first()== null)
                                    <div class="col-2">
                                        {!! Form::Model($commande,['method'=>'post','url'=>route('livraisons.commande',$commande->id)]) !!}
                                        @method('POST')
                                        <button class="btn btn-success btn-circle btn-lg"><span class="fa fa-motorcycle"></span></button>
                                        {!! Form::label('title','Livrer') !!}

                                        {!! Form::close() !!}
                                        @else

                                            {!! Form::Model($commande,['method'=>'post','url'=>route('livraisons.cmd_restor',$commande->id)]) !!}
                                            @method('POST')
                                            <button class="btn btn-success btn-circle btn-lg"><i class="fa fa-refresh" aria-hidden="true">Restaurer</i></button>
                                            {!! Form::close() !!}

                                        @endif
                                    </div>
                            </div>

                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row d-flex justify-content-center"> {{$commandes->links()}}</div>





@stop

