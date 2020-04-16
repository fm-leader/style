<?php

namespace App\Http\Controllers\Admin;

use App\Modele;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Pagination;
//use Illuminate\Http\Request;
use App\Http\Requests\ModeleRequest;
use App\Http\Controllers\Controller;

class ModeleController extends Controller
{

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Guard $auth,$lib_modele = null)
    {
        //
        //$modeles = Modele::orderBy('id','desc')->paginate(7);
        $nbre_model=Modele::select('id')->count();
        $modelises = Modele::all();

        //$commande=Commande::all();


        $modeles = $lib_modele ? Modele::whereLib_modele($lib_modele)->get() : Modele::orderBy('lib_modele','asc')->paginate(7);
        //$commandes = $query->orderBy('id','desc')->paginate(7);




        return view('admin.modeles.index',compact('modeles','auth','nbre_model','lib_modele','modelises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Guard $auth)
    {
        //
        $nbre_model=Modele::select('id')->count();
        $modele = new Modele();
        return view('admin.modeles.create',compact('auth','modele','nbre_model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModeleRequest $ModeleRequest)
    {
        //

        // $ModeleRequest->image_modele->store(config('images.path'), 'public');
        $path = basename($ModeleRequest->image_modele->store('images'));


        $modele = new Modele;
        $modele->lib_modele = $ModeleRequest->lib_modele;
        $modele->prix_modele = $ModeleRequest->prix_modele;
        $modele->description_modele = $ModeleRequest->description_modele;
        $modele->etat_modele = $ModeleRequest->etat_modele;
        $modele->image_modele = $path;
        $modele->save();

        //$momo= Modele::create($ModeleRequest->all());
        //dd($momo);

        return redirect()->route('modeles.index')->with('info','Le modele a bien été enregistré');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Modele $modele)
    {
        //
        $nbre_model=Modele::select('id')->count();

        return view('admin.modeles.show',compact('modele','nbre_model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Modele $modele)
    {
        //
        $nbre_model=Modele::select('id')->count();

        return view('admin.modeles.edit',compact('modele','nbre_model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModeleRequest $ModeleRequest, Modele $modele)
    {
        //
        $modele->update($ModeleRequest->all());

        return redirect()->route('modeles.index')->with('info','Le model a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modele $modele)
    {
        //
        $modele->delete();

        return redirect()->route('modeles.index')->with('info','Le model ont bien été suprimé');
    }
}
