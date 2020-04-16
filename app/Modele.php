<?php

namespace App;

    use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{

    protected $fillable = ['lib_modele','prix_modele','image_modele','description_modele','etat_modele'];

    //Relation entre Model et Commande (1,n)
    public function Commandes(){

        return $this->hasMany(Commande::class);
    }



}
