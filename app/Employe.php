<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{

    protected $fillable = ['nom_employe','telephone_employe','fonction_employe','adresse_employe','photo_employe'];

    //Relation Progression et Employe (1,n)
    public  function progressions(){

        return $this->hasMany(Progression::class);
    }




}