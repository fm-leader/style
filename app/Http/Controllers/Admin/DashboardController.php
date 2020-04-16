<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Client;
use App\Commande;
use App\Modele;
use App\Payement;
use App\Progression;
use App\Employe;
use App\Livraison;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\CommandeRequest;
use App\Http\Requests\ClientRequest;

class DashboardController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        //
        $nbre_cmd= Commande::select('id')->count();
        //dd($nbre_cmd);
        $nbre_model=Modele::select('id')->count();
        //dd($nbre_model);
        $nbre_client=Client::select('id')->count();
        //dd($nbre_client);
        $nbre_livraison=Livraison::select('id')->count();
        //dd($nbre_livraison);
        $nbre_employe=Employe::select('id')->count();
        //dd($nbre_employe);
        $nbre_progression=Progression::select('id')->count();
        //dd($nbre_progression);



        $cmd = new Commande();

        $commandes=Commande::oldest('id')->with('modele','client','payements')->paginate(3);
        $payements = Payement::with('commande')->select('mnt_paie','dat_paie')->get();

        $data_model = \DB::select('SELECT lib_modele,image_modele, COUNT(modele_id) total FROM commandes,modeles
           WHERE commandes.modele_id=modeles.id GROUP BY (modele_id)  DESC  LIMIT 5');
        // $data_model = \DB::select('SELECT lib_modele,image_modele, SUM(lib_modele) total_model FROM modeles GROUP BY lib_modele DESC LIMIT 5');

        return view('admin.index',compact('data_cmd','data_model','commandes','auth','nbre_cmd','nbre_model','nbre_client',
            'nbre_livraison','nbre_employe','nbre_progression'));

    }



}
