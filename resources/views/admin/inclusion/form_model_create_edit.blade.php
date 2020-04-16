<?php

if($modele->id)
{$option=['method'=>'put', 'url'=>route('modeles.update',$modele),'enctype'=>"multipart/form-data"];}
else
{$option=['method'=>'post', 'url'=>route('modeles.store'),'enctype'=>"multipart/form-data"];}

?>


{!! Form::model($modele,$option)  !!}

<div class="containt ">

    <div class="row">
        <div class="col-lg-6 form-group">
            {!! Form::label('title','Nom du Model') !!}
            {!! Form::text('lib_modele',null,['class'=>'form-control'])!!}
            @error('lib_modele')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6 form-group">

            {!! Form::label('title','Photo Model',['class'=>'custom-file-label','for'=>'image']) !!}
            {!! Form::file('image_modele',null,['class'=>'form-control'])!!}

            @error('image_modele')
            <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 form-group">
            {!! Form::label('title','Prix du Model') !!}
            {!! Form::text('prix_modele',null,['class'=>'form-control']) !!}
            @error('prix_modele')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6 form-group">
            {!! Form::label('title','Description Model') !!}
            {!! Form::textarea('description_modele',null,['class'=>'form-control']) !!}
            @error('description_modele')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>




    <button class="btn btn-primary">Enregistrer</button>
</div>

{!! Form::close() !!}
