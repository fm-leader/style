@extends('adminlte::page')

@section('title', 'Admin AP Model Home')

@section('content_header')

@stop



@section('content')






    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$nbre_employe}}</h3>

                    <h2>Tous Les employes</h2>
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


        <div class="col-lg-3 col-6 form-group">
            <!-- small box -->

            <div class="form-group">

                {!! Form::label('title','Telephone  Employe') !!}
                <select  class="form-control select2" style="width: 100%;" onchange="window.location.href = this.value">
                    <option></option>
                    @foreach($employers as $employer)
                        <option value="{{ route('employes.Tel', $employer->telephone_employe) }}" {{ $telephone_employe == $employer->telephone_employe ? 'selected' : '' }}>{{ $employer->telephone_employe }}</option>
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



    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark" >
        <tr style="text-align:center">

            <th>Employe</th>
            <th>Contacts</th>
            <th>Fonction</th>
            <th>Lieu de Residence</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody>

        @foreach($employes as $employe)
            <tr >
                <td>
                    {{ $employe->nom_employe }}
                </td>

                <td>
                    {{ $employe->telephone_employe }}
                </td>

                <td>
                    {{ $employe->fonction_employe }}
                </td>

                <td>
                    {{ $employe->adresse_employe }}
                </td>

                <td>
                    {!! Form::Model($employe,['method'=>'post', 'url'=>route('employes.destroy',$employe->id)]) !!}
                    <a class="btn btn-danger btn-circle btn-lg" href="{{ route('employes.edit',$employe->id) }}" role="button"><span class="fa fa-edit"></span></a>
                    <a class="btn btn-info btn-circle btn-lg" href="{{ route('employes.show',$employe->id) }}" role="button"><span class="fa fa-eye"></span></a>

                    @method('DELETE')
                    <button class="btn btn-danger btn-circle btn-lg"><span class="fa fa-trash"></span></button>

                    {!! Form::close() !!}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    @if($telephone_employe == null)
        <div class="row d-flex justify-content-center"> {{ $employes->links()}} </div>

    @endif

@stop