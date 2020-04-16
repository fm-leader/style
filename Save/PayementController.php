<?php

namespace App\Http\Controllers;

use App\Client;
use App\Commande;
use App\Payement;
use Illuminate\Http\Request;
use App\Http\Requests\PayementRequest;

class PayementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payement = Payement::oldest('dat_paie')->paginate(7);
        $commandes = Commande::all();
        $clients = Client::all();

        return view('payements.index',compact('payement','commandes','clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PayementRequest $PayementRequest)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Payement $payement)
    {
        //
        $commandes = Commande::all();
        $clients = Client::all();

        return view('payements.show',compact('payement','commandes','clients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Payement $payement)
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
    public function update(PayementRequest $PayementRequest, Payement $payement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payement $payement)
    {
        //
    }
}
