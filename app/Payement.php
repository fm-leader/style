<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payement extends Model
{
    //
    public $fillable =['mnt_paie','dat_paie','commande_id'];

    public function commande(){

        return $this->belongsTo(Commande::class);
    }


}
