@extends('adminlte::page')

@section('title', 'Admin AP Model Home')

@section('content_header')
    <h1>Nouvelle Commande Art Principaute Couture; </h1>     <b> {{ $auth->user()->name}}</b>, TU ES CONNECTE!

@stop

@section ('css')
    <link  rel = "stylesheet"  href="{{ asset('css/select2.min.css') }}" >


@stop

@section ('js')

    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/select2.full.min.js') }}"></script>


    <script type="text/javascript">
        //Initialize Select2 Elements " js/select2.full.min.js"
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        })



        // Fonction de visionnage et Telechargement d'image
        $(function(){
            $("input[type='file']").change(showPreviewImage_click);
        })

        function showPreviewImage_click(e){
            var $input = $(this);
            var inputFiles = this.files;
            if(inputFiles == undefined || inputFiles.length == 0) return;
            var inputFile = inputFiles[0];

            var reader = new FileReader();
            reader.onload = function(event) {

                $input.next(".preview").remove();
                $input.after("<img class='preview' height='250' width='200' />");
                $input.next().attr("src", event.target.result);

            };
            reader.onerror = function(event) {
                alert("I AM ERROR: " + event.target.error.code);
            };
            reader.readAsDataURL(inputFile);
        }


        // Fonction de selection de modele et affichage visionnage d'image
        /*
         $(function(){
         $("select[id='modele_id']").change(showPreviewImageModele_click);
         })

         function showPreviewImageModele_click(){


         var reader = new FileReader();
         reader.onload = function(event) {

         $("select[id='modele_id']").next(".preview_modele").remove();
         $("select[id='modele_id']").after("<img class='preview_modele' height='175' width='160' />");
         $("select[id='modele_id']").next().attr("src", event.target.result);

         };

         //var source = "";

         //$("select[id='modele_id']").after("<img src= source width='80' height='80' >");



         }

         */





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
                    $("#dimension_cmd").val("");
                }
                if($('input:radio:checked').val()=='haut'){
                    $('#tab_haut').css({display :'block'});
                    $('#tab_bas').css({display :'none'});
                }
                else{
                    $("input[id^='mth']").val("");
                    $("#dimension_cmd").val("");
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
                    $("#dimension_cmd").val($("input[id^='mth'][value!='']").map(function(){
                                return $(this).val();
                            }).get().join(",")+ '-' + $("#tab_haut td:even label").map(function(){
                                return $(this).text();
                            }).get().join(","))
                    // $("#dimension_cmd").val( )
                }

                if ($('#tab_bas').css('display') == 'block') {
                    //var serie_bas = $("input[id^='mtb']").serialize();
                    var fields = $("input[id^='mth'][value!='']").serializeArray();
                    $("#dimension_cmd").val("");
                    // $("#dimension_cmd").val(serie_bas);
                    jQuery.each( fields, function( i, field ) {
                        $("#dimension_cmd").val($("#dimension_cmd").val() + " "+ field.value  );
                    });
                }
            }

            $(document).ready(function(){
                $("#dimension_cmd").focus(showValues);
                $("input[id^='mth']").change( showValues );
                $("input[id^='mth']").focus( showValues );

                // var cpt = document.getElementById("tab_add_supp").rows.length;
                //var tem;

            })

        })

        //fonction de selection de model dans l'image
        function image_modele_select(){
            if(document.getElementById('img_select'))
            { $("#img_select").remove(); }
            var image_mod = document.createElement('img');
            image_mod.id ='img_select';
            image_mod.width='200';
            image_mod.height='250';
            //image_mod.src=this.value;
            document.getElementById('div_select_model').appendChild(image_mod);
        };






        /*
         $(document).ready(function(){
         $("#client_id").change(onSelectChange);
         });

         function onSelectChange(){
         if($("#client_id option:selected").val() != 0){
         output = $("#client_id option:selected").val();
         }
         //alert(output);

         }
         */




    </script>


@stop



@section('content')



    <div class="container">
        <header class="">
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