<?php

if($commande->id)

{$option=['method'=>'put', 'url'=>route('commandes.update',$commande),'enctype'=>"multipart/form-data"];}
else
{$option=['method'=>'post', 'url'=>route('commandes.store'),'enctype'=>"multipart/form-data"];}

?>



{!! Form::model($commande,$option)  !!}



<div class="row">

    <div class="col-lg-4 form-group">

        {!! Form::label('title','Client') !!}

        <select name="client_id" id="client_id"   class="form-control select2" style="width: 100%;"  >
            <option value="">-- Liste des Clients --</option>
            @foreach($clients as $client)
                <option value="{{ $client->id }}" {{$client->id == $commande->client_id  ? 'selected' : ''}} @if(old('client_id')== "{$client->id}" ) {{'selected'}}  @endif  <?php  ?>

                        > {{$client->nom_client}} </option>
            @endforeach
        </select>
        @error('client_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-lg-4 form-group">

        {!! Form::label('title','Date de Rendez-Vous') !!}
        {!! Form::datetimeLocal('rdv_cmd',null,['class'=>'form-control'] )!!}
        @error('rdv_cmd')
        <div class="text-danger">{{ $message }}</div>
        @enderror

    </div>

    <div class="col-lg-4 form-group">
        {!! Form::label('title','Prix') !!}
        {!! Form::number('prix_cmd',null,['class'=>'form-control'] )!!}
        @error('prix_cmd')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>




</div>


<div class="row">

</div>

<div class="row">

    <!-- ##### Mesure de Client ##### -->
    <div class="col-lg-4 form-group">

        {!! Form::label('title','Description Commande') !!}
        {!! Form::textarea('description_cmd',null,['class'=>'form-control'] )!!}
        @error('description_cmd')
        <div class="text-danger">{{ $message }}</div>
        @enderror


    </div>
    <!-- ##### FIN Mesure de Client ##### -->
    <div class="col-lg-8 form-group">
        <div class="col-lg-6 form-group" id="div_select_model">
            {!! Form::label('title','Model',['class'=>'custom-file-label','for'=>'image']) !!}
            <select name="modele_id" class="form-control" id="modele_id" onChange="image_modele_select();document.getElementById('img_select').src = this.value;">
                <option value="">-- Choix du Model --</option>
                @foreach($modeles as $modele)

                    <option value="{{asset('storage/images/'.$modele->image_modele) }}" {{$modele->id == $commande->modele_id ? 'selected' : ''}} img="{{asset('storage/images/'.$modele->image_modele) }}"> {{$modele->lib_modele}}</option>

                @endforeach
            </select>

            @error('modele_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>

        <div class="col-lg-6 form-group">
            {!! Form::label('title','Echantillon',['class'=>'custom-file-label','for'=>'image']) !!}
            {!! Form::file('echantillon_cmd', null,['class'=>'form-control','value'=>"{{ old('echantillon_cmd') }}"] )!!}

            @error('echantillon_cmd')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


    </div>

</div>



</div>


<button class="btn btn-primary">Enregistrer</button>



{!! Form::close() !!}






