@extends('adminlte::page')

@section('title', 'Admin AP Model Home')

@section('content_header')

@stop


@section ('css')
    <link  rel = "stylesheet"  href="{{ asset('css/bootstrap.min.css') }}" >
    owl.carousel.min
@stop

@section ('js')
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.inputmask.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript">
        /*
         $( function() {
         var dateFormat = "mm/dd/yy",
         from = $( "#from" )
         .datepicker({
         defaultDate: "+1w",
         changeMonth: true,
         numberOfMonths: 3
         })
         .on( "change", function() {
         to.datepicker( "option", "minDate", getDate( this ) );
         }),
         to = $( "#to" ).datepicker({
         defaultDate: "+1w",
         changeMonth: true,
         numberOfMonths: 3
         })
         .on( "change", function() {
         from.datepicker( "option", "maxDate", getDate( this ) );
         });

         function getDate( element ) {
         var date;
         try {
         date = $.datepicker.parseDate( dateFormat, element.value );
         } catch( error ) {
         date = null;
         }

         return date;
         }
         } );

         */
    </script>


@stop



@section('content')



    <div class="row">
        <div class="col-lg-3 form-group">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$nbre_client}}</h3>

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
                    <h3>{{$nbre_client}}</h3>

                    <h2>Enregistrer Nouveau Client</h2>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('clients.create') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>



        <div class="col-lg-3 col-6 form-group">
            <!-- small box -->

            <div class="form-group">

                {!! Form::label('title','Telephone du Client') !!}
                <select  class="form-control select2" style="width: 100%;" onchange="window.location.href = this.value">
                    <option></option>
                    @foreach($clientels as $clientel)
                        <option value="{{ route('clients.numTel', $clientel->contact_client) }}" {{ $contact_client == $clientel->contact_client ? 'selected' : '' }}>{{ $clientel->contact_client }}</option>
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




    <div id="contain" class="row">

        <div id="contain_tab" class="col">

            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark" >
                <tr style="text-align:center">

                    <th>Client</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Ville</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>


                @foreach($clients as $client)
                    <tr >
                        <td>
                            {{ $client->nom_client }}
                        </td>

                        <td>
                            {{ $client->contact_client }}
                        </td>

                        <td>
                            {{ $client->email_client }}
                        </td>

                        <td>
                            {{ $client->adresse_client }}
                        </td>

                        <td>
                            {!! Form::Model($client,['method'=>'post', 'url'=>route('clients.destroy',$client->id)]) !!}
                            <a class="btn btn-danger btn-circle btn-lg" href="{{ route('clients.edit',$client->id) }}" role="button"><span class="fa fa-edit"></span></a>
                            <a class="btn btn-info btn-circle btn-lg" href="{{ route('clients.show',$client->id) }}" role="button"><span class="fa fa-eye"></span></a>

                            @method('DELETE')
                            <button class="btn btn-danger btn-circle btn-lg"><span class="fa fa-trash"></span></button>

                            {!! Form::close() !!}
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

            @if($contact_client == null)
                <div class="row d-flex justify-content-center"> {{ $clients->links()}} </div>
            @endif
        </div>
    </div>

@stop