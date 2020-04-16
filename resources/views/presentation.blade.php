@extends('templatesSiteweb')

@section('title', 'Accueil')


@section ('css')

    <link  rel = "stylesheet"  href="{{ asset('css/owl.carousel.min.css') }}" >

    <style>

        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;}
    </style>

@stop

@section ('js')
    <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>

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

    <div class="row blog-header-logo ">
        <div class="col titre_logo d-flex justify-content-center text-muted" id="titre_logo">  <img src="{{asset('storage/images/Logo_AD.jpg') }}" width="40" height="15" class="img-fluid rounded-circle">
            <h2 class="text-title bg-dark mb-3 d-flex justify-content-center text-light"> QUI SOMMES NOUS</h2> <img src="{{asset('storage/images/Logo_AD.jpg') }}" width="40" height="15" class="img-fluid rounded-circle">

        </div>

    </div>

    <div class="containt">


        <div class="row">
            <div class="col-6">

                <img src="{{asset('storage/images/Diaby.jpg') }}" width="" height="" class="img-fluid rounded-circle">


            </div>
            <div class="col-6">
                <h5 class="text-title bg-dark mb-3 d-flex justify-content-center text-light"> Biographie </h5>

                Je suis DIABY IBRAHIMA né le 26 mars 1978 à GAGNOA état civil DIABY LARTPRINCIPAUTE nom de scène styliste désigner ivoirien résidant à Abidjan c'est après 3 ans de formation chez un particulier à l'intérieur du pays notamment à GAGNOA ma ville natal que j'ai choisi de venir Abidjan avec les rêves plein la tête après avoir travaillé dans quelques ateliers de couture dans différentes communes d'Abidjan gérés des maisons de couture collaboré avec quelques grands noms de la mode ivoirienne que je décide avec les moyens de bord et de l'expérience de choisi YOPOUGON comme point de départ.<br> YOPOUGON ou j'ai ouvert mon atelier fin 2012, début 2013 en 2017 je crée ma marque de vêtements que je baptise L'ART PRINCIPAUTE une manière de dire l'art de s'habiller comme des princes et des princesses ET L'ART PRINCIPAUTE COUTURE pour MA MAISON DE COUTURE. <br> Je mets l'accent sur le prêt à porter ou je travail par collection ,pour cette fin d'année ma dernière collection est baptisé PRINCE'KITA, pour cette collection nous mettons en valeur le pagne BAOULE (LE KITA) pour valoriser nos produits locaux amenez notre jeunesse à utiliser et mettre en valeur ce qui nous représente notre identité culturelle, les projets en préparation un défilé de mode prévu pour 2020, ouverture d'une maison de couture dans la commune de COCODY.
                <br> <br> Faire de Vous des Princes est ma devis.
            </div>

            <input type="color" name="couleur2" value="">

        </div>




    </div>








@stop