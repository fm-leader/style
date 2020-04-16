<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;


use App\Modele;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Pagination;
//use Illuminate\Http\Request;
use App\Http\Requests\ModeleRequest;
use App\Http\Controllers\Controller;


class SitewebController extends Controller
{



    public function accueil_site()
    {
        //
        //$modeles = Modele::orderBy('id','desc')->paginate(7);
        $nbre_model=Modele::select('id')->count();
        $modelises = Modele::all();
        //$commande=Commande::all();
        $modeles = Modele::orderBy('lib_modele','asc')->paginate(6);
        //$commandes = $query->orderBy('id','desc')->paginate(7);


       // return view('welcome',compact('modeles','nbre_model','modelises'));
        return view('accueil',compact('modeles','nbre_model','modelises'));
    }



    public function contact()
    {
        //
        //$modeles = Modele::orderBy('id','desc')->paginate(7);
        $nbre_model=Modele::select('id')->count();
        $modelises = Modele::all();
        //$commande=Commande::all();
        $modeles = Modele::orderBy('lib_modele','asc')->paginate(7);
        //$commandes = $query->orderBy('id','desc')->paginate(7);


        return view('contact',compact('modeles','nbre_model','modelises'));
    }


    public function presentation()
    {
        //

        $nbre_model=Modele::select('id')->count();

        $modeles = Modele::orderBy('lib_modele','asc')->paginate(7);


        return view('presentation',compact('modeles','nbre_model','modelises'));
    }




    public function contact_mail()
    {
        //
        $nbre_model=Modele::select('id')->count();

        $modeles = Modele::orderBy('lib_modele','asc')->paginate(7);


        return view('contact',compact('modeles','nbre_model','modelises'));
    }





}
