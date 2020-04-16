@extends('adminlte::page')

@section('title', 'Admin AP Model Home')

@section('content_header')

    <h2> COMMANDE DU JOURS   <strong>{{ date("l, d-m-Y ") }}</strong> <br></h2>

@stop

@section ('css')
    <link  rel = "stylesheet"  href="{{ asset('css/bootstrap.min.css') }}" >
    <link  rel = "stylesheet"  href="{{ asset('css/Chart.min.css') }}" >
    <style>

        canvas {
            border: 1px dotted red;
            background: #1D1F20;
        }

        .chart-container {
            height: 40vh;

        }

    </style>
@stop

@section ('js')
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/hBarChart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/Chart.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/Chart.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/hBarChart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('https://unpkg.com/ionicons@5.0.0/dist/ionicons.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            $("ul.chart").hBarChart();
            $("ul.chart_model").hBarChart();
        })

        $(function () {
            var data = {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul","Aou", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Dataset #1",
                    backgroundColor: "rgba(255,99,132,0.2)",
                    borderColor: "rgba(255,99,132,1)",
                    borderWidth: 2,
                    hoverBackgroundColor: "rgba(255,99,132,0.4)",
                    hoverBorderColor: "rgba(255,99,132,1)",
                    data: [65, 59, 20, 81, 56, 55, 40, 48, 70, 45, 31, 70],
                }]
            };

            var options = {
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        stacked: true,
                        gridLines: {
                            display: true,
                            color: "rgba(255,99,132,0.2)"
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }]
                }
            };

            Chart.Bar('chart', {
                options: options,
                data: data
            });

        })

    </script>
@stop

@section('content')

    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$nbre_cmd}}</h3>

                    <h2>Commandes</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('commandes.index') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$nbre_model}}</h3>

                    <h2>Models</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>

                </div>
                <a href="{{ route('modeles.index') }}" class="small-box-footer">Plus d 'info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{$nbre_client}}</h3>

                    <h2>Clients</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-people-sharp "></i>
                </div>
                <a href="{{ route('clients.index') }}" class="small-box-footer">Plus d'info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{$nbre_employe}}</h3>

                    <h2>Employes</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('employes.index') }}" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

    </div>



    <!-- ./row -->
    <div class="row">

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
                <div class="inner">
                    <h3>150</h3>

                    <h2>Comptabilite</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('clients.create') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$nbre_livraison}}</h3>

                    <h2>Livraisons</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('livraisons.index') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>{{$nbre_progression}}</h3>

                    <h2>Progressions</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-people-sharp"></i>
                </div>
                <a href="{{ route('progressions.index') }}" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$nbre_cmd}}</h3>

                    <h2>Statistiques</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('index') }}" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>



    <div class="row">
        <div class="col-lg-6 ">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Les RDV</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark" >
                        <tr style="text-align:center">
                            <th>Client</th>
                            <th>RDV</th>
                            <th>Prix</th>
                            <th>Model</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($commandes as $commande)
                            <tr >

                                <td>
                                    {{$commande->client->nom_client}}
                                </td>

                                <td>
                                    {{$commande->rdv_cmd}}
                                </td>

                                <td>
                                    {{$commande->prix_cmd}}
                                </td>

                                <td>
                                    @if($commande->modele->image_modele)
                                        <img src="{{asset('storage/images/'.$commande->modele->image_modele) }}" width="55" height="80" >
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
            </div>
        </div>

        <div class="col-lg-6 ">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="col-lg-8 col-8 card-title">Diagramme a Barres des Ventes par Mois</h3>
                    <div class="col-lg-3 col-3 card-tools"></div>

                    <div class="col-lg-1 col-1card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="chart-container">
                        <canvas id="chart"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

    </div>



    <div class="row">
        <div class="col-lg-6 ">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                    <div class="card-tools"></div>
                </div>
                <div class="card-body">

                </div>
                <!-- /.card-body -->
            </div>
        </div>

        <div class="col-lg-6">
            <div class=" card card-success">
                <div class="card-header">
                    <h3  class="col-lg-10 col-10 card-title">Les Models les plus vendus</h3>
                    <div class="col-lg-1 col-1 card-tools"></div>

                    <div class="col-lg-1 col-1 card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div class="container">
                            <ul class="chart">
                                @foreach($data_model as $ligne)
                                    <li data-data="{{$ligne->total}}"><img src=" {{asset('storage/images/'.$ligne->image_modele)}}" width="50" height="50" > {{$ligne->lib_modele}} ({{$ligne->total}}) </li>
                                @endforeach
                            </ul>

                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>


        </div>

@stop