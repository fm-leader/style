@extends('adminlte::page')

@section('title', 'Admin AP Model Home')

@section('content_header')
    <h1>Nouvelle Commande Art Principaute Couture  <br>

    </h1>
@stop


@section ('js')
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.js') }}"></script>

    <script type="text/javascript">


        $(function(){
            $("input[type='file']").change(showPreviewImage_click);
        })

        function showPreviewImage_click(e) {
            var $input = $(this);
            var inputFiles = this.files;
            if(inputFiles == undefined || inputFiles.length == 0) return;
            var inputFile = inputFiles[0];

            var reader = new FileReader();
            reader.onload = function(event) {

                $input.next(".preview").remove();
                $input.after("<img class='preview' height='175' width='160' />");
                $input.next().attr("src", event.target.result);


            };
            reader.onerror = function(event) {
                alert("I AM ERROR: " + event.target.error.code);
            };
            reader.readAsDataURL(inputFile);
        }



    </script>


@stop


@section('content')
    <<p> <b> {{$email=App\User::find(\Illuminate\Support\Facades\Auth::id())->name}}</b>, TU ES CONNECTE!</p>


    <div class="container">
        <header class="">
            <p class="">Nouvelle Commande</p>
        </header>
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
                        <h3></h3>

                        <h2>Nouvelle Commande</h2>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('commandes.create') }}" class="small-box-footer">Plus d 'info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- phone mask -->

        </div>

        <div class="">

            @include('admin.inclusion.form_cmd_create_edit')

        </div>
    </div>
@stop