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

                Je suis DIABY IBRAHIMA n� le 26 mars 1978 � GAGNOA �tat civil DIABY LARTPRINCIPAUTE nom de sc�ne styliste d�signer ivoirien r�sidant � Abidjan c'est apr�s 3 ans de formation chez un particulier � l'int�rieur du pays notamment � GAGNOA ma ville natal que j'ai choisi de venir Abidjan avec les r�ves plein la t�te apr�s avoir travaill� dans quelques ateliers de couture dans diff�rentes communes d'Abidjan g�r�s des maisons de couture collabor� avec quelques grands noms de la mode ivoirienne que je d�cide avec les moyens de bord et de l'exp�rience de choisi YOPOUGON comme point de d�part.<br> YOPOUGON ou j'ai ouvert mon atelier fin 2012, d�but 2013 en 2017 je cr�e ma marque de v�tements que je baptise L'ART PRINCIPAUTE une mani�re de dire l'art de s'habiller comme des princes et des princesses ET L'ART PRINCIPAUTE COUTURE pour MA MAISON DE COUTURE. <br> Je mets l'accent sur le pr�t � porter ou je travail par collection ,pour cette fin d'ann�e ma derni�re collection est baptis� PRINCE'KITA, pour cette collection nous mettons en valeur le pagne BAOULE (LE KITA) pour valoriser nos produits locaux amenez notre jeunesse � utiliser et mettre en valeur ce qui nous repr�sente notre identit� culturelle, les projets en pr�paration un d�fil� de mode pr�vu pour 2020, ouverture d'une maison de couture dans la commune de COCODY.
                <br> <br> Faire de Vous des Princes est ma devis.
            </div>

            <input type="color" name="couleur2" value="">

        </div>




    </div>








@stop