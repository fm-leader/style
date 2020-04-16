<?php

namespace App\Http\Controllers;

use App\Commande;
use App\Modele;
use App\Progression;
use Facade\FlareClient\Http\Client;
//use Illuminate\Http\Request;

use App\Http\Requests\ClientRequest;
use Illuminate\Console\Command;

class ClientController extends Controller
{
    public function index()
    {
        //
        $clients=Client::oldest('nom_client')->paginate(7);
        $commande=Commande::all();
        return view('clients.index',compact('clients','commande'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $ClientRequest)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
        $commandes=Command::all();
        $modeles=Modele::all();
        $progres=Progression::all();

        view('clients.show',compact('commandes','modeles','progres'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
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
    public function update(ClientRequest $ClientRequest, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
