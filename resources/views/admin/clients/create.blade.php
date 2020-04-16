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
    <script type="text/javascript">


        // Fonction d'ajout de champ dans le formulaire de mesures

        $(document).ready(function(){
            $("#ajoute_champ").click(function () {
                var rep =prompt('Nom du Champ','');
                if(rep!=''){
                    if($('#tab_haut').css('display')=='block') {
                        var cpth = document.getElementById("tab_haut").rows.length;
                        var vall =cpth+1;
                        var mth= 'mth'+vall;
                        $("#tab_haut").append("<tr ><td><label for="+mth+">" + rep.toUpperCase() + "</label> </td> <td> <input class='form-control' id="+mth+ " type='number' name="+mth+ "> </td> </tr>");

                    }
                    if($('#tab_bas').css('display')=='block') {
                        var cptb = document.getElementById("tab_bas").rows.length;
                        var vall2 =cptb+1;
                        var mtb= 'mth'+vall2;
                        alert(mtb);
                        $("#tab_bas").append("<tr ><td><label for="+mtb+">" + rep.toUpperCase() + "</label> </td> <td> <input class='form-control' id="+mtb+" type='number' name="+mtb+ "> </td> </tr>");

                    }

                }


            });

        });

        // Fonction de suppression de champ dans le formulaire de mesures
        $(document).ready(function(){
            $("#supprime_champ").click(function () {
                if($('#tab_haut').css('display')=='block') {
                    $("#tab_haut tr:last-child").remove();
                }
                if($('#tab_bas').css('display')=='block') {
                    $("#tab_bas tr:last-child").remove();
                }
            })

        });

        // Fonction de basculement d'un formulaire a un autre avec le bontton radio
        $(document).ready(function(){
            $('input:radio[name=haut_bas]').click(function(){

                if($('input:radio:checked').val()=='bas'){
                    $('#tab_haut').css({display :'none'});
                    $('#tab_bas').css({display :'block'});
                    // alert($('input:radio[id=radio_bas]:checked'));
                }else{
                    $("input[id^='mtb']").val("");
                    $("#dimension_client").val("");
                }
                if($('input:radio:checked').val()=='haut'){
                    $('#tab_haut').css({display :'block'});
                    $('#tab_bas').css({display :'none'});
                }
                else{
                    $("input[id^='mth']").val("");
                    $("#dimension_client").val("");
                }


            });


//fonction de serialisation des donnees de mesure dans un champs

            function showValues() {
                var rep = $("td:eq(1) input").val();
                // $(this).val(rep);
                if ($('#tab_haut').css('display') == 'block') {

                    /*solution 1*****
                     //var serie_haut = $("input[id^='mth'][value!='']").serializeArray();
                     var fields = $("input[id^='mth'][value!='']").serializeArray();
                     $("#dimension_cmd").val("");

                     ***solution 2***
                     //$("#dimension_cmd").val(serie_haut);
                     jQuery.each( fields, function( i, field ) {
                     $("#dimension_cmd").val($("#dimension_cmd").val() + " "+ field.value  );
                     });
                     */
                    // ***solution 3
                    $("#dimension_client").val($("input[id^='mth'][value!='']").map(function(){
                                return $(this).val();
                            }).get().join(",")+ '-' + $("#tab_haut td:even label").map(function(){
                                return $(this).text();
                            }).get().join(","))
                    // $("#dimension_cmd").val( )
                }

                if ($('#tab_bas').css('display') == 'block') {
                    //var serie_bas = $("input[id^='mtb']").serialize();
                    var fields = $("input[id^='mth'][value!='']").serializeArray();
                    $("#dimension_client").val("");
                    // $("#dimension_cmd").val(serie_bas);
                    jQuery.each( fields, function( i, field ) {
                        $("#dimension_client").val($("#dimension_client").val() + " "+ field.value  );
                    });
                }
            }

            $(document).ready(function(){
                $("#dimension_client").focus(showValues);
                $("input[id^='mth']").change( showValues );
                $("input[id^='mth']").focus( showValues );

                // var cpt = document.getElementById("tab_add_supp").rows.length;
                //var tem;

            })

        })






    </script>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
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
        <div class="col-lg-3 col-6">
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
    </div>

    @include('admin.inclusion.form_client_create_edit')

@stop