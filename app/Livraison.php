<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    //

    public $fillable=['dat_livre','commande_id'];

    public function commande(){

        return $this->belongsTo(Commande::class);
    }
}
