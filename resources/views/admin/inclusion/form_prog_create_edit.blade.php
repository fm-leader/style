<?php

if($progression->id)
{$option=['method'=>'put', 'url'=>route('progressions.update',$progression),'enctype'=>"multipart/form-data"];}
else
{$option=['method'=>'post', 'url'=>route('progressions.store'),'enctype'=>"multipart/form-data"];}


?>
{{-- ['lib_progres','datdeb_progres','prix_progres','datfin_progres','materiel_progres','employe_id','commande_id'] --}}

{!! Form::model($progression,$option)  !!}



<div class="containt ">
    <div class="row">
        <div class="col-lg-3 form-group">
            {!! Form::label('title','Etape') !!}
            <select name="lib_progres"  class="form-control select2" style="width: 100%;">

                <option value="Decoupe" >Decoupe</option>
                <option value="Montage" >Montage</option>
                <option value="Boutton" >Boutton</option>
                <option value="Broderie" >Broderie</option>
                <option value="Finition" >Finition</option>

            </select>
            @error('lib_progres')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-3 form-group">
            {!! Form::label('title','Prix') !!}
            {!! Form::number('prix_progres',null,['class'=>'form-control'])!!}
            @error('prix_progres')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="col-lg-3 form-group">
            {!! Form::label('title','Date de debut') !!}
            {!! Form::datetimeLocal('datdeb_progres',null,['class'=>'form-control'])!!}
            @error('datdeb_progres')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="col-lg-3 form-group">
            {!! Form::label('title','Date de Fin') !!}
            {!! Form::datetimeLocal('datfin_progres',null,['class'=>'form-control']) !!}
            @error('datfin_progres')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="row">
        <div class="col-lg-3 form-group">
            {!! Form::label('title','Employe') !!}
            {!! Form::select('employe_id',$employe,['employe'=>'nom_employe'],['class'=>'select2','style'=>'width: 100%;'])!!}
            @error('employe_id')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="col-lg-3 form-group">
            {!! Form::label('title','Commande') !!}
            {!! Form::select('commande_id',$commande,['commande'=>'lib_cmd'],['class'=>'select2','style'=>'width: 100%;'])!!}
            @error('commande_id')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="col-lg-6 form-group">

            {!! Form::hidden('materiel_progres',null,['class'=>'form-control','id'=>'materiel_progres'])!!}
            @error('materiel_progres')
            <div class=" text-danger">{{ $message }}</div>
            @enderror

            <table class="table table-striped table-bordered table-hover" class="form-group clearfix">
                <thead class="thead-dark" >
                <tr style="text-align:center">
                    <th colspan="3" style="text-align:center"><h3>Materiels Utilises</h3></th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{!! Form::label('title','Craie') !!}: <input type="checkbox" name="mat_1" id="mat_1" value="craie1" ></td>
                    <td>{!! Form::label('title','Craie') !!}:<input type="checkbox" name="mat_2" id="mat_2" value="craie2"  ></td>
                    <td>{!! Form::label('title','Craie') !!}:<input type="checkbox" name="mat_3" value="craie3" id="mat_3"  ></td>
                </tr>
                <tr>
                    <td>{!! Form::label('title','Craie') !!}: <input type="checkbox" name="mat_4" id="mat_4" value="craie4"  ></td>
                    <td>{!! Form::label('title','Craie') !!}:<input type="checkbox" name="mat_5" id="mat_5" value="craie5"  ></td>
                    <td>{!! Form::label('title','Craie') !!}:<input type="checkbox" name="mat_6" id="mat_6" value="craie6" ></td>
                </tr>
                <tr>
                    <td>{!! Form::label('title','Craie') !!}: <input type="checkbox" name="mat_7" id="mat_7" value="craie7"  ></td>
                    <td>{!! Form::label('title','Craie') !!}:<input type="checkbox" name="mat_8" id="mat_8" value="craie8" ></td>
                    <td>{!! Form::label('title','Craie') !!}:<input type="checkbox" name="mat_9" id="mat_9" value="craie9"  ></td>
                </tr>
                </tbody>
            </table>

        </div>


    </div>

    <div class="row">

    </div>
    {{--dd($progression)--}}

    <button class="btn btn-primary">Enregistrer</button>
</div>

{!! Form::close() !!}
