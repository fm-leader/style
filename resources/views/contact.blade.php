@extends('templatesSiteweb')

@section('title', 'Accueil')


@section ('css')

    <link  rel = "stylesheet"  href="{{ asset('css/owl.carousel.min.css') }}" >

    <style>

        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;}

        #map_canvas { height: 100% ; width:100%;}
    </style>

@stop

@section ('js')
    <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>

    <script type="text/javascript" >
        $(document).ready(function(){
            $('#div_diaporama').owlCarousel({
                items:1,
                autoplay:true
            });


        });


        $(document).ready(function(){
            // Activate Carousel
            $("#myCarousel").carousel();

            // Enable Carousel Indicators
            $(".item1").click(function(){
                $("#myCarousel").carousel(0);
            });
            $(".item2").click(function(){
                $("#myCarousel").carousel(1);
            });
            $(".item3").click(function(){
                $("#myCarousel").carousel(2);
            });

            // Enable Carousel Controls
            $(".carousel-control-prev").click(function(){
                $("#myCarousel").carousel("prev");
            });
            $(".carousel-control-next").click(function(){
                $("#myCarousel").carousel("next");
            });
        });



     </script>


@stop



@section('content')

    <div class="row  blog-header-logo ">
        <div class="col titre_logo d-flex justify-content-center border-dark  "  id="titre_logo">  <img src="{{asset('storage/images/Logo_AD.jpg') }}" width="50" height="20" class="img-fluid rounded-circle">
            <h3 class="text-title bg-dark mb-3 d-flex justify-content-center text-light"> Contactez-Nous</h3> <img src="{{asset('storage/images/Logo_AD.jpg') }}" width="50" height="20" class="img-fluid rounded-circle">

        </div>

    </div>

    <div class="row ">
        <h2 class="col  text-light"> contact

        </h2>

    </div>



    <div class="containt">


        <h2 class="text-title  mb-3 d-flex justify-content-center text-muted border-muted">Contacts</h2>
        <div class="row">
            <div class="col-6">
                <div class="card text-info ">

                    <div class="text-center card-head card-header ">
                        <h4 class="text-title  mb-3 d-flex justify-content-center text-muted card-text">Telephones</h4>
                    </div>
                    <div class=" text-center card-body">
                        <h6 class="text-title  mb-3 d-flex justify-content-center text-muted">(+225) 09 51 51 95</h6>
                        <h6 class="text-title  mb-3 d-flex justify-content-center text-muted">(+225) 53 53 47 43</h6>
                        <h6 class="text-title  mb-3 d-flex justify-content-center text-muted">(+225) 72 72 72 51</h6>
                        <h6 class="text-title  mb-3 d-flex justify-content-center text-muted">(+225) 23 00 14 62</h6>
                        <h6 class="text-title  mb-3 d-flex justify-content-center text-muted">(+225) 05 05 00 30</h6>

                    </div>
                    <div class="card-footer  text-white">
                        <p class="text-center card-text"></p>
                    </div>
                </div>

            </div>


            <div class="col-6">
                <div class="card  text-info ">

                    <div class="text-center card-head card-header  ">
                        <h4 class="text-title mb-3 d-flex justify-content-center text-muted card-text">Reseaux Sociaux</h4>
                    </div>
                    <div class=" text-center card-body">
                        <h6 class="text-title  mb-3 d-flex justify-content-left text-muted">
                            <img src="{{asset('storage/images/fb.png') }}" width="50" height="15" class="img-fluid rounded-circle"> www.facebook.com/Diaby-lartprincipaute-321186015497157/
                        </h6>
                        <h6 class="text-title  mb-3 d-flex justify-content-left text-muted">
                            <img src="{{asset('storage/images/whas.jpg') }}" width="50" height="15" class="img-fluid rounded-circle">(+225) 09 51 51 72
                        </h6>
                        <h6 class="text-title  mb-3 d-flex justify-content-left text-muted">
                            <img src="{{asset('storage/images/email.png') }}" width="50" height="15" class="img-fluid rounded-circle">
                            Info@lartprincipaute-couture.com
                        </h6>

                    </div>
                    <div class="card-footer  text-white">
                        <p class="text-center card-text"></p>
                    </div>
                </div>


            </div>


        </div>





        <h2 class="text-title  mb-3 d-flex justify-content-center text-muted">Envoyer nous vos Suggestions</h2>
        {!! Form::open(['method'=>'post']) !!}
        <div class="row">


            <div class="col-6">

                {!! Form::label('title','Votre Nom') !!}
                {!! Form::text('rdv_cmd',null,['class'=>'form-control'] )!!}

            </div>
            <div class="col-6">
                {!! Form::label('title','Votre Email') !!}
                {!! Form::email('rdv_cmd',null,['class'=>'form-control'] )!!}

            </div>

        </div>

        <div class="row">

            <div class="col">
                {!! Form::label('title','Sujet') !!}
                <select name=""  class="form-control select2" style="width: 100%;">

                    <option value="Decoupe" >Decoupe</option>
                    <option value="Montage" >Montage</option>
                    <option value="Boutton" >Boutton</option>
                    <option value="Broderie" >Broderie</option>
                    <option value="Finition" >Finition</option>

                </select>
            </div>

        </div>

        <div class="row">

            <div class="col">
                {!! Form::label('title','Votre Texte') !!}
                {!! Form::textarea('rdv_cmd',null,['class'=>'form-control'] )!!}
            </div>

        </div>

        <div class="row">

            <div class="col text-center">
                <span class=" col-8 btn bg-primary" role="button" ><button class="btn btn-primary">Envoyer</button></span>
            </div>

        </div>


        {!! Form::close() !!}

        <div class="row">
            <div class="col text-light"> Loc</div>
        </div>



        <div class="row">

            <div class="col">


                <div class="card text-info ">

                    <div class="text-center card-head  card-header  ">
                        <h4 class="text-title  mb-3 d-flex justify-content-center text-muted card-text">Localisation</h4>
                    </div>
                    <div class=" text-center card-body">
                        <h6 class="text-title mb-3 d-flex justify-content-center text-muted">Yopougon Rue princesse en face de Dani Store</h6>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31779.964792035174!2d-4.100227!3d5.34104685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sci!4v1585238429580!5m2!1sfr!2sci" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="card-footer text-white">
                        <p class="text-center card-text"></p>
                    </div>
                </div>
            </div>


        </div>

    </div>








@stop