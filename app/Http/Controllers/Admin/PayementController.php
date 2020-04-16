<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Commande;
use App\Payement;
use Illuminate\Http\Request;
use App\Http\Requests\PayementRequest;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Carbon\Carbon;

class PayementController extends Controller
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
    public function index(Guard $auth)
    {
        //
        $payements = Payement::orderBy('id','desc')->paginate(7);
        $commandes = Commande::all();
        $clients = Client::all();

        return view('admin.payements.index',compact('payements','commandes','clients','auth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $payement = new Payement();
        //$payement = Payement::oldest('dat_paie')->paginate(7);
        $commandes = Commande::all();
        $clients = Client::all();

        return view('admin.payements.create',compact('payement','commandes','clients','auth'));
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

        //if()
        $payement = new Payement();

        $payement->dat_paie= Carbon::now();
        $payement->mnt_paie= $PayementRequest->mnt_paie;
        $payement->commande()->associate($PayementRequest->commande_id);
        $payement->save();

        //dd($payement);
        return redirect()->route('payements.index')->with('info','Le payement a été bien enregistrée.');

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
        $payement->delete();

        return redirect()->route('$payements.index')->with('info','La Progression a bien ete suprimee');
    }
}
