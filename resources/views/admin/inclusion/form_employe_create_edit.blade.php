<?php

if($employe->id)

{$option=['method'=>'post', 'url'=>route('employes.update',$employe),'enctype'=>"multipart/form-data"];}
else

{$option=['method'=>'post', 'url'=>route('employes.store'),'enctype'=>"multipart/form-data"];}

?>


{!! Form::model($employe,$option)  !!}

<div class="containt">

    <div class="row">
        <div class="col-lg-4 form-group">
            {!! Form::label('title','Nom et Prenom de l\'Employe') !!}
            {!! Form::text('nom_employe',null,['class'=>'form-control'])!!}
            @error('nom_employe')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-4 form-group">

            {!! Form::label('title','Contact de l\'Employe') !!}
            {!! Form::tel('telephone_employe',null,['class'=>'form-control']) !!}
            @error('telephone_employe')
            <div class="alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-4 form-group">

            {!! Form::label('title','Adresse de l\'Employe') !!}
            {!! Form::text('adresse_employe',null,['class'=>'form-control']) !!}
            @error('adresse_employe')
            <div class="alert-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>


    <div class="row">

        <div class="col-lg-4 form-group">

            {!! Form::label('title','Date de Prise de Service') !!}
            {!! Form::datetimeLocal('title',null,['class'=>'form-control'] )!!}
        </div>


        <div class="col-lg-4 form-group">

            {!! Form::label('title','Fonction') !!}
            {!! Form::text('fonction_employe',null,['class'=>'form-control']) !!}
            @error('fonction_employe')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-4 form-group">

            {!! Form::label('title','Photo',['class'=>'','for'=>'image']) !!}
            {!! Form::file('photo_employe', null,['class'=>'form-control','value'=>"{{ old('photo_client') }}"] )!!}

            @error('photo_employe')
            <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
    </div>




    <button class="btn btn-primary">Enregistrer</button>
</div>



{!! Form::close() !!}