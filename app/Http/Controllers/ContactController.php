<?php

namespace App\Http\Controllers;

use App\Modele;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    /**
     * Affiche la page Contact
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $nbre_model=Modele::select('id')->count();

        $modeles = Modele::orderBy('lib_modele','asc')->paginate(7);

        return view('contact.create',compact('modeles','nbre_model','modelises'));
    }

    /**
     * Fonction pour Envoyer le mail.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $modelises = Modele::all();

        return redirect()->route('contact.create')->with('info','Votre message a bien ete envoye');
    }


}
