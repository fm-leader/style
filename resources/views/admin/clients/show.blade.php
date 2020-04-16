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
                    <h2>{{$nbre_client }} Enregistrements</h2>

                    <h2>Tous les Clients</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('clients.index') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- small box -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h2> - </h2>

                    <h2>Nouveau Client</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('clients.create') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-6">
            <div class="card text-white text-info">
                <div class="card-header text-center card-header bg-dark ">
                    <h2 class="text-uppercase ">{{ $client->nom_client}}</h2>
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{ $client->contact_client }}</h3>

                    <p>

                    <h2>{{$client->nom_client }}</h2>

                    </p>
                    <div class="card-footer bg-info text-white ">
                        <h2>{{ $client->contact_client }}</h2>

                    </div>
                </div>

            </div>

        </div>

        <div class="col-lg-6">


            <div class="card text-white text-info">
                <div class="card-header text-center card-header bg-dark ">
                    <h2 class="text-uppercase ">{{ $client->nom_client}}</h2>
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{ $client->email_client }}</h3>

                    <p>

                    <h2>{{$client->adresse_client }}</h2>

                    </p>
                    <div class="card-footer bg-info text-white ">
                        <h2>{{ $client->contact_client }}</h2>

                    </div>
                </div>

            </div>
        </div>



    </div>



    <div class="row text-dark ">

        <div class="col-lg-6 text-uppercase text-info ">
            <h2 class="text-uppercase text-muted">
                @php


                if($client->dimension_client){
                $nom_valeur=$client->dimension_client;
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
        </div>



        <div class="col-lg-6 text-uppercase text-info ">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark" >
                <tr style="text-align:center">
                    <th>Commande</th>
                    <th>RDV</th>
                    <th>Prix</th>
                    <th>Model</th>
                    <th>Echantillon</th>
                    <th>Reste</th>
                </tr>
                </thead>
                <tbody>

                @foreach($info_cmd_client as $info)
                    <tr >
                        <td>
                            {{$info->lib_cmd}}
                        </td>
                        <td>
                            {{$info->rdv_cmd}}
                        </td>

                        <td>
                            {{$info->prix_cmd}}
                        </td>

                        <td tem="{{$modele_cl=App\Modele::where('id','=',$info->modele_id)->select('image_modele')->value('image_modele')}}">



                            <img src="{{asset('storage/images/'.$modele_cl) }}" width="40" height="50" class="img-fluid rounded">

                        </td>

                        <td>
                            <img src="{{asset('storage/images/'.$info->echantillon_cmd) }}" width="40" height="50" class="img-fluid rounded">
                        </td>

                        <td>

                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>



@stop