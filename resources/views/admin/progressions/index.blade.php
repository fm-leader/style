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
                    <h3>{{$nbre_progression}}</h3>

                    <h2>Toutes les Etapes de Traitement des commandes</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('progressions.index') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- small box -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>150</h3>

                    <h2>Nouvelle Etape</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('progressions.create') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6 form-group">
            <!-- small box -->

            <div class="form-group">

                {!! Form::label('title','Telephone du Client') !!}
                <select  class="form-control select2" style="width: 100%;" onchange="window.location.href = this.value">
                    <option></option>
                    @foreach($commandes  as $commande )
                        <option value="{{ route('progressions.etape', $commande->id) }}" {{ $commande_id == $commande->lib_cmd ? 'selected' : '' }}>{{ $commande->lib_cmd }}</option>
                    @endforeach
                </select>

                <!-- /.input group -->
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


    <table class="table table-striped table-bordered table-hover justify-content-center">
        <thead class="thead-dark" >
        <tr style="text-align:center">

            <th>Commande</th>
            <th>Etape</th>
            <th>Date debut</th>
            <th>Date Fin</th>
            <th>Employe</th>
            <th>Prix</th>
            <th>Materiel utilises</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($progressions as $progression)
            <tr >
                <td>

                    {{$progression->commande->lib_cmd}}


                </td>

                <td>

                    {{$progression->lib_progres}}
                </td>

                <td>

                    {{$progression->datdeb_progres}}

                </td>

                <td>

                    {{$progression->datfin_progres}}
                </td>

                <td>

                    {{$progression->employe->nom_employe}}
                </td>

                <td>
                    {{$progression->prix_progres}}
                </td>

                <td>
                    {{$progression->materiel_progres}}
                </td>

                <td>
                    {!! Form::Model($progressions,['method'=>'post', 'url'=>route('progressions.destroy',$progression->id)]) !!}
                    <a class="btn btn-danger btn-circle btn-lg" href="{{ route('progressions.edit',$progression->id) }}" role="button"><span class="fa fa-edit"></span></a>
                    <a class="btn btn-info btn-circle btn-lg" href="{{ route('progressions.show',$progression->id) }}" role="button"><span class="fa fa-eye"></span></a>

                    @method('DELETE')
                    <button class="btn btn-danger btn-circle btn-lg"><span class="fa fa-trash"></span></button>

                    {!! Form::close() !!}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>


    <div class="row d-flex justify-content-center"> {{$progressions->links()}}</div>


@stop