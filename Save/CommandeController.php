<?php

namespace App\Http\Controllers;

use App\Client;
use App\Commande;
use App\Modele;
use Illuminate\Http\Request;
use App\Http\Requests\CommandeRequest;

class CommandeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
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
    public function index()
    {
        //
        $commandes=Commande::oldest('lib_cmd')->paginate(7);
        $clients=Client::all();
        $modeles=Modele::all();
        return view('home',compact('commandes','clients','modeles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $modeles=Modele::all();
        return view('commandes.create',compact('modeles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommandeRequest $CommandeRequest)
    {
        //

        $commande=Commande::create($CommandeRequest->all());
        $commande->client()->attach($CommandeRequest->cli);
        $commande->modele()->attach($CommandeRequest->mod);

        dd($commande);

        redirect()->route('commandes.index')->with('info','La Commande a été bien enregistrée.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        //
        $client= $commande->client->nom_client;
        $modele= $commande->modele->lib_modele;
        return view('commandes.show',compact('commande','client','modele'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        //
        $clients=Client::all();
        $modeles=Modele::all();
        return view('commandes.edit',compact('modeles','clients','commande'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommandeRequest $CommandeRequest, Commande $commande)
    {
        //
        $commande->update($CommandeRequest->all());
        $commande->client()->sync($CommandeRequest->cli);
        $commande->modele()->sync($CommandeRequest->mod);

        redirect()->route('commandes.index')->with('info','La commande a bien été modifiée.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        //
    }
}
