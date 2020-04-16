

@extends('adminlte::page')

@section('title', 'Admin AP Model Home')

@section('content_header')
@stop


@section ('css')
    <link  rel = "stylesheet"  href="{{ asset('css/bootstrap.min.css') }}" >
@stop

@section ('js')
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.js') }}"></script>
@stop


@section('content')


    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>

                    <h2>Nouvelle Commande</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('commandes.create') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- small box -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>150</h3>

                    <h2>Nouvelle Commande</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('commandes.create') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <p> <h1 class="text-center text-uppercase text-info m-4 bg-dark" > <b>Bordereau de Commande : {{$commande->lib_cmd }}</b>  </h1></p>

    <div class="">
        <div class="row text-dark bg-white ">
            <span class="col-lg-4 text-lowercase"><h2 class="text-uppercase text-muted">Client: <b>{{ $client->nom_client}}</b></h2> <h2 class="text-uppercase text-muted">Contact: <b>{{ $client->contact_client}}</b></h2></span>
            <span class="col-lg-4 text-white "><h2 class="text-uppercase text-muted">Date Commande:<b>{{ $commande->created_at}}</b></h2> <h2 class="text-uppercase text-muted">Commande: <b>{{$commande->lib_cmd }}</b></h2></span>
            <span class="col-lg-4 "><h2 class="text-uppercase text-muted">Prix Commande: <b>{{ $commande->prix_cmd }} F CFA</b></h2> <h2 class="text-uppercase text-muted">Date RDV:<b>{{ $commande->rdv_cmd}}</b></h2></span>

        </div>

        <div class="row text-dark ">
                <span class="col-lg-4 text-uppercase text-muted">
                <h2 class="text-uppercase text-muted">
                    @php  if($commande->client->dimension_client){
                    $nom_valeur=$commande->client->dimension_client;
                    $tab_nom_valeur=explode('-',$nom_valeur);
                    $tab_valeur=explode(',',$tab_nom_valeur[0]);
                    $tab_nom=explode(',',$tab_nom_valeur[1]);
                    echo "<table class='table table-striped table-bordered table-hover'>
                        <thead class='thead-dark' >
                        <tr style='text-align:center'>
                            <th>Mesures</th>
                            <th>Valeur</th>
                        </tr>
                        </thead> <tbody>";
                        for($i=0; $i<count($tab_nom);$i++){
                        echo "<tr ><td>".$tab_nom[$i]. "</td> <td>". $tab_valeur[$i]." </td> </tr>";
                        }
                        echo " </tbody></table>";
                    }

                    @endphp
                </h2>
                </span>
                <span class="col-lg-4 text-uppercase text-info ">
                    <div class="row card text-white ">
                        <div class="text-center text-uppercase card-header bg-dark card-text">
                            <h2><b>{{ $modele->lib_modele}}</b></h2>
                        </div>
                        <div class=" text-center card-body">
                            @if($modele->image_modele)
                                <img src="{{asset('storage/images/'.$modele->image_modele) }}" width="250" height="100" class="img-fluid rounded-circle">
                            @endif
                            <h2 class="text-uppercase text-muted text-center">Prix de Modele:<b>{{ $modele->prix_modele }} F CFA</b></h2>
                        </div>
                        <div class="card-footer bg-dark text-white">
                            <p class="text-center card-text">Description Du Model</p>
                        </div>
                    </div>

                </span>
                <span class="col-lg-4 text-uppercase text-white ">
                    <div class="card">
                        <div class="text-center text-uppercase card-header bg-dark card-text"><h2><b>Echantillon de Tissu</b></h2>:</div>
                        <div class="card-body text-center">
                            <img src="{{asset('storage/images/'.$commande->echantillon_cmd) }}" width="250" height="130" class="img-fluid rounded-circle">
                        </div>
                    </div>
                </span>
        </div>


        <div class="row text-white ">
            <div class="col-lg-4 card text-white bg-dark ">

            </div>

            <div class="col-lg-8">
                <div class="row text-white">
                    <div class="col-lg-8">
                        <h2 class=" text-muted">Employes intervenants</h2>
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark" >
                            <tr style="text-align:center">
                                <th>Etape</th>
                                <th>Employe</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($progressions as $progression)
                                <tr >
                                    <td>
                                        {{$progression->lib_progres}}
                                    </td>
                                    <td>
                                        {{$progression->employe->nom_employe}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-4">
                        <h2 class=" text-muted">Payements</h2>
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark" >
                            <tr style="text-align:center">
                                <th>Payements</th>
                                <th>Reste</th>
                                <th>Date Payement</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payements as $payement)
                                <tr >
                                    <td>
                                        {{$payement->mnt_paie}}
                                    </td>
                                    <td>

                                        {{$commande->prix_cmd=$commande->prix_cmd-$payement->mnt_paie }}
                                    </td>
                                    <td>
                                        {{$payement->dat_paie}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>

        </div>

    </div>





@stop