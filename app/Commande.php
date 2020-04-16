<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    //
    public $fillable =['lib_cmd','date_cmd','rdv_cmd','prix_cmd','echantillon_cmd','modele_id','client_id','nom_client','contact_client','mnt_paie','created_at'];

    //Relation Commande et Client (1,n)
    public function client(){

        //$commande=new Commande();
        //$commande->client()->where();

        return $this->belongsTo(Client::class);
    }


    //Relation Commande et Model (1,n)
    public function modele(){

        return $this->belongsTo(Modele::class);
    }



    public function livraisons(){

        return $this->hasMany(Livraison::class);

    }

    public function payements(){

        return $this->hasMany(Payement::class);
    }

    public function progressions(){



        return $this->hasMany(Progression::class);
    }



    /*
    public function getCreateClientNameAttribute(){

        //if($this->nom_client){

            return $this->nom_client;

        //}

    }

    public function setCreateClientNameAttribute($value){


        return $this->client->nom_client=$value;

    }


    public function getCreateClientContactAttribute(){

        if($this->contact_client){

            return $this->client->contact_client;

        }

    }

    public function setCreateClientContactAttribute($value){

        $this->client->contact_client=$value;
        return $this->client->save();

    }


*/






}
