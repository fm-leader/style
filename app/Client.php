<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = ['nom_client','contact_client','email_client','adresse_client','photo_client','dimension_client'];

    // Relation entre Client et Commandes (1,n)
    public  function commandes(){

        return $this->hasMany(Commande::class);


    }
}
