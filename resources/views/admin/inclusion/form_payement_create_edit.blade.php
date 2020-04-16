<?php

if($payement->id)

{$option=['method'=>'put', 'url'=>route('payements.update',$payement),'enctype'=>"multipart/form-data"];}
else
{$option=['method'=>'post', 'url'=>route('payements.store'),'enctype'=>"multipart/form-data"];}

?>



{!! Form::model($payement,$option)  !!}


<div class="contain">
    <div class="row">

        <div class="col-lg-4 form-group">

            {!! Form::label('title','Commandes') !!}

            <select name="commande_id" class="form-control" id="client_id"  >
                <option value="">-- Liste des Commandes --</option>
                @foreach($commandes as $commande)

                    <option value="{{$commande->id }}" {{$commande->id  == $payement->commande_id ? 'selected' : ''}}>{{$commande->lib_cmd}}</option>
                @endforeach
            </select>
            @error('commande_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="">


        </div>

        <div class="col-lg-4 form-group">
            {!! Form::label('title','Somme a payer') !!}
            {!! Form::number('mnt_paie',null,['class'=>'form-control'] )!!}
            @error('mnt_paie')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>




    </div>


    <div class="row">

    </div>

    <div class="row">

    </div>
</div>





<button class="btn btn-primary">Enregistrer</button>



{!! Form::close() !!}






