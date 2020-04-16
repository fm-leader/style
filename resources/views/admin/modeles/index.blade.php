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
                    <h3>150</h3>

                    <h2>Tous les Models</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('modeles.index') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- small box -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>150</h3>

                    <h2>Nouveau Model</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('modeles.create') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>




        <div class="col-lg-3 col-6 form-group">
            <!-- small box -->

            <div class="form-group">

                {!! Form::label('title','Telephone du Client') !!}
                <select  class="form-control select2" style="width: 100%;" onchange="window.location.href = this.value">
                    <option></option>
                    @foreach($modelises as $modelise)
                        <option value="{{ route('modeles.lib', $modelise->lib_modele) }}" {{ $lib_modele == $modelise->lib_modele ? 'selected' : '' }}>{{ $modelise->lib_modele }}</option>
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

            <th>Model</th>
            <th>Photo</th>
            <th>Prix</th>
            <th>Etat</th>
            <th>Description</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody>

        @foreach($modeles as $modele)
            <tr >
                <td>
                    {{ $modele->lib_modele }}
                </td>

                <td>
                    @if($modele->image_modele)
                        <img src="{{asset('storage/images/'.$modele->image_modele) }}" width="100" height="100">
                    @endif
                </td>

                <td>
                    {{ $modele->prix_modele }}
                </td>

                <td>
                    {{ $modele->etat_modele }}
                </td>

                <td>
                    {{ $modele->description_modele}}
                </td>

                <td>
                    {!! Form::Model($modeles,['method'=>'post', 'url'=>route('modeles.destroy',$modele->id)]) !!}
                    <a class="btn btn-danger btn-circle btn-lg" href="{{ route('modeles.edit',$modele->id) }}" role="button"><span class="fa fa-edit"></span></a>
                    <a class="btn btn-info btn-circle btn-lg" href="{{ route('modeles.show',$modele->id) }}" role="button"><span class="fa fa-eye"></span></a>

                    @method('DELETE')
                    <button class="btn btn-danger btn-circle btn-lg"><span class="fa fa-trash"></span></button>

                    {!! Form::close() !!}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    @if($lib_modele == null)
        <div class="row d-flex justify-content-center"> {{$modeles->links()}}</div>
    @endif


@stop