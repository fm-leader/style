@extends('adminlte::page')

@section('title', 'Admin AP Model Home')

@section('content_header')

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

        //Initialize Select2 Elements " js/bootstrap-switch.min.js"

        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });


        // Fonction our serialise le materiels utilse sous forme de chaine de caracteres
        function showValues() {
            var str = $("input[type='checkbox']").serialize();
            $( "#materiel_progres" ).val( str );

            /*
             $("#materiel_progres").val($("input[type='checkbox']").map(function(){
             return $(this).val();
             }).get().join(","))
             // $("#dimension_cmd").val( )
             */
        }



        $(document).ready(function(){
            // $( "input[type='checkbox'], input[type='radio']" ).on( "click", showValues );
            // $("#materiel_progres").focus(showValues);
            // $("input[id^='mat_']").click(showValues);
            $("input[id^='mat_']").on( "click", showValues );
            // var cpt = document.getElementById("tab_add_supp").rows.length;
            //var tem;
        })

    </script>
@stop

@section('content')
    <p> <b> {{$email=App\User::find(\Illuminate\Support\Facades\Auth::id())->name }}</b>, TU ES CONNECTE!</p>


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
    </div>

    @include('admin.inclusion.form_prog_create_edit')

@stop