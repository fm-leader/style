<?php

if($client->id)

{$option=['method'=>'put', 'url'=>route('clients.update',$client),'enctype'=>"multipart/form-data"];}
else

{$option=['method'=>'post', 'url'=>route('clients.store'),'enctype'=>"multipart/form-data"];}

?>


{!! Form::model($client,$option)  !!}

<div class="containt">

    <div class="row">
        <div class="col-lg-4 form-group">
            {!! Form::label('title','Nom et Prenom du Client') !!}
            {!! Form::text('nom_client',null,['class'=>'form-control'])!!}
            @error('nom_client')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-4 form-group">

            {!! Form::label('title','Telephone du Client') !!}
            {!! Form::tel('contact_client',null,['class'=>'form-control']) !!}
            @error('contact_client')
            <div class="alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-4 form-group">
            {!! Form::label('title','Email') !!}
            {!! Form::email('email_client',null,['class'=>'form-control'])!!}
            @error('nom_client')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>


    <div class="row">

        <!-- ##### Mesure de Client ##### -->
        <div class="col-lg-4 form-group">

            {!! Form::hidden('dimension_client',null,['class'=>'form-control','id'=>'dimension_client'] )!!}




            <fieldset>
                <legend>Mesures</legend>
                @error('dimension_client')
                <div class="text-danger">{{ $message }}
                </div>
                @enderror
                <input type="radio" name="haut_bas" value="haut" id="radio_haut" checked>
                <label for="Haut">Haut</label>
                <input type="radio" name="haut_bas" value="bas" id="radio_bas">
                <label for="Bas">Bas</label>

                <table style="display:block;" class="table table-striped table-bordered table-hover"  id="tab_haut">

                    <tr >
                        <td>
                            <label for="mth1">Epaule</label>
                        </td>
                        <td>
                            <input id="mth1" type="number" name="mth1" class='form-control'>
                        </td>
                    </tr>
                    <tr >
                        <td>
                            <label for="mth2">Manche</label>
                        </td>
                        <td>
                            <input id="mth2" type="number" name="mth2" class='form-control'>
                        </td>
                    </tr>
                    <tr >
                        <td>
                            <label for="mth3">Tour Manche</label>
                        </td>
                        <td>
                            <input id="mth3" type="number" name="mth3" class='form-control'>
                        </td>
                    </tr>
                    <tr >
                        <td>
                            <label for="mth4">Tour de poitrine</label>
                        </td>
                        <td>
                            <input id="mth4" type="number" name="mth4" class='form-control'>
                        </td>
                    </tr>
                    <tr >
                        <td>
                            <label for="mth5">Tour de Taille</label>
                        </td>
                        <td>
                            <input id="mth5" type="number" name="mth5" class='form-control'>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <label for="mth6">Bassin Haut</label>
                        </td>
                        <td>
                            <input id="mth6" type="number" name="mth6" class='form-control'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mth7">Longueur</label>
                        </td>
                        <td>
                            <input id="mth7" type="number" name="mth7" class='form-control'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mth8">Col</label>
                        </td>
                        <td>
                            <input id="mth8" type="number" name="mth8" class='form-control'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mth9">poignet</label>
                        </td>
                        <td>
                            <input id="mth9" type="number" name="mth9" class='form-control'>
                        </td>
                    </tr>


                </table>

                <table style="display:none;" class="table table-striped table-bordered table-hover" id="tab_bas">

                    <tr>
                        <td>
                            <label for="mtb1">Tour de Ceinture</label>
                        </td>
                        <td>
                            <input id="mtb1" type="number" name="mtb1" class='form-control'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mtb2">Tour de Bassin</label>
                        </td>
                        <td>
                            <input id="mtb2" type="number" name="mtb2" class='form-control'>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="mtb3">Tour de Cuisse</label>
                        </td>
                        <td>
                            <input id="mtb3" type="number" name="mtb3" class='form-control'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mtb4">Tour de Genous</label>
                        </td>
                        <td>
                            <input id="mtb4" type="number" name="mtb4" class='form-control'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mtb5">Longueur</label>
                        </td>
                        <td>
                            <input id="mtb5" type="number" name="mtb5" class='form-control'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mtb6">Bas</label>
                        </td>
                        <td>
                            <input id="mtb6" type="number" name="mtb6" class='form-control'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mtb7">Frappe</label>
                        </td>
                        <td>
                            <input id="mtb7" type="number" name="mtb7" class='form-control'>
                        </td>
                    </tr>



                </table>
            </fieldset>
            {!! Form::button('',['class'=>'form-control fa fa-plus','id'=>'ajoute_champ'] )!!}
            {!! Form::button('',['class'=>'form-control fa fa-minus','id'=>'supprime_champ'] )!!}



        </div>
        <!-- ##### FIN Mesure de Client ##### -->


        <div class="col-lg-4 form-group">

            {!! Form::label('title','Adresse du Client') !!}
            {!! Form::text('adresse_client',null,['class'=>'form-control'] )!!}
        </div>


        <div class="col-lg-4 form-group">

            {!! Form::label('title','Photo',['class'=>'','for'=>'image']) !!}
            {!! Form::file('photo_client', null,['class'=>'form-control','value'=>"{{ old('photo_client') }}"] )!!}

            @error('photo_client')
            <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>

        <!-- phone mask -->

    </div>




    <button class="btn btn-primary">Enregistrer</button>
</div>



{!! Form::close() !!}