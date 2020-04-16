<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progression extends Model
{

    public $fillable =['lib_progres','datdeb_progres','prix_progres','datfin_progres','materiel_progres','employe_id','commande_id'];

    //Relation Progression et Employe (1,n)

    public function employe(){

        return $this->belongsTo(Employe::class);
    }

    public function commande(){

        return $this->belongsTo(Commande::class);
    }


}
