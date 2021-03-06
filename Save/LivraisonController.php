<?php

namespace App\Http\Controllers;

use App\Client;
use App\Commande;
use App\Livraison;
use Illuminate\Http\Request;
use App\Http\Requests\Livraisonrequest;

class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $livraison = Livraison::oldest('dat_livre')->paginate(7);
        $commandes = Commande::all();
        $clients = Client::all();

        return view('livraisons.index',compact('livraison','commandes','clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('livraison.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Livraisonrequest $Livraisonrequest)
    {
        //
        return redirect()->with();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Livraison $livraison)
    {
        //
        $commandes = Commande::all();
        $clients = Client::all();
        return view('livraisons.show',compact('commandes','clients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Livraison $livraison)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Livraisonrequest $Livraisonrequest, Livraison $livraison)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livraison $livraison)
    {
        //
    }
}
